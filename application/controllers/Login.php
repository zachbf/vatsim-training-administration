<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index()
	{	
		if ($this->session->userdata('logged_in')) {
	        redirect('');
	    }
	    else
	    {
			$this->load->view('login');
		}
	}	
	
    public function sso()
	{
		if($this->session->userdata('logged_in'))
        { 
        redirect('');
        }
        else
        {	
		// Find redirection location
		if(isset($_GET['redirect']))
		{
		    $_SESSION['redirect'] = $_GET['redirect'];
		}
		require_once(FCPATH.'sso/OAuth.php');
		require_once(FCPATH.'sso/SSO.class.php');
		require_once(FCPATH.'sso/config.php');
		$sso['return'] =  base_url() . 'login/sso?return';
		
		// initiate the SSO class with consumer details and encryption details
		$SSO = new SSO($sso['base'], $sso['key'], $sso['secret'], $sso['method'], $sso['cert']);
		
		// return variable is needed later in this script
		$sso_return = $sso['return'];
		// remove other config variables
		unset($sso);
		
		// if VATSIM has redirected the member back
		
		//file here, store session variable of where the user came from. If doesn't exist, send to index
		if (isset($_GET['return']) && isset($_GET['oauth_verifier']) && !isset($_GET['oauth_cancel'])){
		    // check to make sure there is a saved token for this user
		    if (isset($_SESSION[SSO_SESSION]) && isset($_SESSION[SSO_SESSION]['key']) && isset($_SESSION[SSO_SESSION]['secret'])){
		
		
		        if (@$_GET['oauth_token']!=$_SESSION[SSO_SESSION]['key']){
		            echo '<p>Returned token does not match</p>';
		            die();
		        }
		
		        if (@!isset($_GET['oauth_verifier'])){
		            echo '<p>No verification code provided</p>';
		            die();
		        }
		
		        // obtain the details of this user from VATSIM
		        $user = $SSO->checkLogin($_SESSION[SSO_SESSION]['key'], $_SESSION[SSO_SESSION]['secret'], @$_GET['oauth_verifier']);
		
		        if ($user){
		            
					$sessiondata = array(
			        'id'  => $user->user->id,
			        'logged_in' => TRUE
					);
										
					if($this->User->isStaff($user->user->id))
					{
						//The user is in the manager database.
						$date = new DateTime();
						$now = $date->getTimestamp();
						$this->User->updateUserLogin($user->user->id, $now, $user->user->email, $user->user->name_first, $user->user->name_last, $user->user->rating->short);
						
						$this->session->set_userdata($sessiondata);
						redirect('');
					}
					else
					{
						//echo '<script>$(document).ready(function(){ alert("You are not authorised to access this page.");}';						
						$this->load->view('login');
					}
					
		            // do not proceed to send the user back to VATSIM
		            die();
		        } else {
		            // OAuth or cURL errors have occurred, output here
		            echo '<p>An error occurred</p>';
		            $error = $SSO->error();
		
		            if ($error['code']){
		                echo '<p>Error code: '.$error['code'].'</p>';
		            }
		
		            echo '<p>Error message: '.$error['message'].'</p>';
		
		            // do not proceed to send the user back to VATSIM
		            die();
		        }
		    }
		// the user cancelled their login and were sent back
		} else if (isset($_GET['return']) && isset($_GET['oauth_cancel'])){
		    echo '<a href="' . base_url() . 'login">Start Again</a><br />';
		
		    echo '<p>You cancelled your login.</p>';
		
		    die();
		}
		
		// create a request token for this login. Provides return URL and suspended/inactive settings
		$token = $SSO->requestToken($sso_return, false, false);
		
		if ($token){
		
		    // store the token information in the session so that we can retrieve it when the user returns
		    $_SESSION[SSO_SESSION] = array(
		        'key' => (string)$token->token->oauth_token, // identifying string for this token
		        'secret' => (string)$token->token->oauth_token_secret // secret (password) for this token. Keep server-side, do not make visible to the user
		    );
		
		    // redirect the member to VATSIM
		    $SSO->sendToVatsim();
		
		} else {
		
		    echo '<p>An error occurred</p>';
		    $error = $SSO->error();
		
		    if ($error['code']){
		        echo '<p>Error code: '.$error['code'].'</p>';
		    }
		
		    echo '<p>Error message: '.$error['message'].'</p>';
		
		}
		//Close the if logged in.
		}
		
	}
	
	public function logout()
	{
		if (!$this->session->userdata('logged_in')) {
	        redirect('login');
	    }
	    else
	    {
			$this->session->sess_destroy();
			redirect('login');
		}
	}
}
