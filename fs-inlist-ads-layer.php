<?php

	class qa_html_theme_layer extends qa_html_theme_base {

	public $sabbir=1;
	public $ilastatus;
	
	public function q_list_item($q_item)
	{
		qa_html_theme_base::q_list_item($q_item);
		$this->ilastatus=false;
		if (qa_opt('inlist_ads_pages_all')){
			$this->ilastatus=true;
			}
		else {
			if (qa_opt('inlist_ads_pages_'.$this->template)) {
			$this->ilastatus=true;
				}
			}
			
		if (qa_request_part(0) == 'questions' && !empty(qa_request_part(1)))
		{
           $slug=trim(qa_request_part(1));
           $catslugs=explode(',',str_replace(' ','',trim(qa_opt('inlist_ads_category'))));
           if (in_array($slug,$catslugs)) {
           	$this->ilastatus=false;
         }
         
		
		if (qa_opt('inlist_ads_enable')) {
		if ($this->ilastatus) {
		if (($this->sabbir%qa_opt('inlist_ads_questions')) == 0) {
		$this->output('<div class="qa-q-list-item' . rtrim(' ' . @$q_item['classes']) . '" ' . @$q_item['tags'] . '>');
		if (qa_opt('inlist_ads_credit')) {
		$this->output('<i><small>Ads by '.qa_html(qa_opt('site_title')).'</small></i><br/>');
		}
		$this->output(qa_html(qa_opt('inlist_ads_html')));
		$this->output('</div> <!-- END qa-q-list-item -->', '');
		}
		}
		}
		$this->sabbir++;
		
		
	}
	}

