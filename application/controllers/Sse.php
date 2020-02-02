<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sse extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$realtime = $this->db->get_where("realtime",[
			"`changed`"=>"1"
		])->result();
		$this->output->set_header('Cache-Control: no-cache')
			->set_content_type('text/event-stream')
			->set_output( "data: {$realtime[0]->data}\n\n");
	}
}
