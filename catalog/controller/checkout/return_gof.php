<?php 
class ControllerCheckoutReturnGof extends Controller { 
	public function index() { 
	  $this->load->model('checkout/order');	
	 // if(isset($_GET['transactionid'])&&isset($_GET['orderid'])&&isset($_GET['amount'])&&isset($_GET['signature'])&&isset($_GET['status']))
	  //{
	  	$TransactionId=$_GET['transactionid'];
        $OrderId=$_GET['orderid'];
        $Status =$_GET['status'];
        $Currency=$_GET['currency'];
		//if(!empty($_GET['amount']))//********
        $Amount=$_GET['amount'];
        //$Reason=$_GET['reason'];
		//if(!empty($_GET['currencytype']))//*********
        $OriginalCurrency=$_GET['originalcurrency'];
        $OriginalAmount=$_GET['originalamount'];
        $Signature=$_GET['signature'];
	 
        $SecretKey=$this->config->get('gofpay_secretkey');
		//if(empty($Amount))$Signature_local=md5($TransactionId.$OrderId.$Status.$SecretKey);//*********
		//else
        $Signature_local=md5($TransactionId.$OrderId.$Status.$Currency.$Amount.$OriginalCurrency.$OriginalAmount.$SecretKey);
	   //}
	     $data['about_order']='About your order';
	    
	     $data['form']=1;
      if (! strcasecmp ( $Signature_local, $Signature )) 
      {
      	if (isset ( $Status ) && $Status == 'Success' )
      	{   //echo  'Pay for success!';
		   $data['gof_message'] = 'Your order has been successful payment!';
      	}
	    else 
	    {
	    	if (isset ( $Status ) && $Status == 'Pending')
	    	{
			   //echo  'Waiting for payment!' ;
			   $data['gof_message'] = 'Your order is being processed!';
	    	}
		    elseif (isset ( $Status ) && $Status == 'Failure')
		    {
			   //echo  'Failure to pay!';
			   $data['gof_message'] = 'Sorry,your order payment is unsuccessful!';
		    }
        }
      }
      
      else
      {
      	//echo 'The verification of the data is invalid!';//ึงธถั้ึคสงฐÜ
      	
      	$data['form']=0;
      	$data['gof_message'] = 'Sorry, the orders data authentication failure may have been tampered!';
      }
		$data['gof_TransactionId']=$TransactionId;
		$data['gof_OrderId']=$OrderId;
		$data['gof_Status']=$Status;
		
		if (isset($this->session->data['order_id'])) {
			$this->cart->clear();
			
			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);
			unset($this->session->data['guest']);
			unset($this->session->data['comment']);
			unset($this->session->data['order_id']);	
			unset($this->session->data['coupon']);
			unset($this->session->data['reward']);
			unset($this->session->data['voucher']);
			unset($this->session->data['vouchers']);
		}	
									   
		$this->language->load('checkout/success');
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		$data['breadcrumbs'] = array(); 

      	$data['breadcrumbs'][] = array(
        	'href'      => $this->url->link('common/home'),
        	'text'      => $this->language->get('text_home'),
        	'separator' => false
      	); 
		
      	$data['breadcrumbs'][] = array(
        	'href'      => $this->url->link('checkout/cart'),
        	'text'      => $this->language->get('text_basket'),
        	'separator' => $this->language->get('text_separator')
      	);
				
		$data['breadcrumbs'][] = array(
			'href'      => $this->url->link('checkout/checkout', '', 'SSL'),
			'text'      => $this->language->get('text_checkout'),
			'separator' => $this->language->get('text_separator')
		);	
					
      	$data['breadcrumbs'][] = array(
        	'href'      => $this->url->link('checkout/success'),
        	'text'      => $this->language->get('text_success'),
        	'separator' => $this->language->get('text_separator')
      	);
		
    	$data['heading_title'] = $this->language->get('heading_title');

		if ($this->customer->isLogged()) {
    		$data['text_message'] = sprintf($this->language->get('text_customer'), $this->url->link('account/account', '', 'SSL'), $this->url->link('account/order', '', 'SSL'), $this->url->link('account/download', '', 'SSL'), $this->url->link('information/contact'));
		} else {
    		$data['text_message'] = sprintf($this->language->get('text_guest'), $this->url->link('information/contact'));
		}
		
    	$data['button_continue'] = $this->language->get('button_continue');
        $data['button_account'] ='My Account';
    	$data['continue'] = $this->url->link('common/home');
    	$data['account']=$this->url->link('account/account');

		/*if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/return_gof.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/return_gof.tpl';
		} else {
			$this->template = 'default/template/common/success.tpl';
		}*/
		
		/*$this->children = array(
			'common/column_left',
			'common/column_right',
			'common/content_top',
			'common/content_bottom',
			'common/footer',
			'common/header'			
		);*/

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');
				
		//$this->response->setOutput($this->render());
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/return_gof.tpl')) {
			$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/common/return_gof.tpl', $data));
		} else {
			$this->response->setOutput($this->load->view('default/template/common/return_gof.tpl', $data));
		}
  	}
}
?>