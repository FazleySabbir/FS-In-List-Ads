<?php
	class fs_inlist_ads_admin {

		function option_default($option) {
			switch($option) {
				case 'demo_ad':
					return 'This is a demo ad.';
				case 'inlist_ads_questions':
				    return 5;
				default:
					return null;				
			}
			
		}
		
		function allow_template($template)
		{
			return ($template!='admin');
		}	   
			
		function admin_form(&$qa_content)
		{				
			
			$ok = null;
			
			if (qa_clicked('inlist_ads_save')) {
				
				
					qa_opt('inlist_ads_enable',(bool)qa_post_text('inlist_ads_enable'));
					qa_opt('inlist_ads_credit',(bool)qa_post_text('inlist_ads_credit'));
					qa_opt('inlist_ads_pages_all',(bool)qa_post_text('inlist_ads_pages_all'));
					qa_opt('inlist_ads_pages_activity',(bool)qa_post_text('inlist_ads_pages_activity'));
					qa_opt('inlist_ads_pages_qa',(bool)qa_post_text('inlist_ads_pages_qa'));
					qa_opt('inlist_ads_pages_questions',(bool)qa_post_text('inlist_ads_pages_questions'));
					qa_opt('inlist_ads_pages_hot',(bool)qa_post_text('inlist_ads_pages_hot'));
					qa_opt('inlist_ads_pages_unanswered',(bool)qa_post_text('inlist_ads_pages_unanswered'));
					qa_opt('inlist_ads_pages_tag',(bool)qa_post_text('inlist_ads_pages_tag'));
					qa_opt('inlist_ads_questions',(int)qa_post_text('inlist_ads_questions'));
					qa_opt('inlist_ads_html',qa_post_text('inlist_ads_html'));
					
					
					$ok = 'Settings Saved.';
				
			}
			
			$fields = array();
			
			$fields[] = array(
				'label' => 'Enable In List Ads',
				'tags' => 'NAME="inlist_ads_enable"',
				'value' => qa_opt('inlist_ads_enable'),
				'type' => 'checkbox',
			);
			
			$fields[] = array(
				'label' => 'Show site credit above ads',
				'tags' => 'NAME="inlist_ads_credit"',
				'value' => qa_opt('inlist_ads_credit'),
				'type' => 'checkbox',
				'note' => 'If this box is checked, a site credit will be added above the ads.Like: Ads by (SiteName)',
			);
			$fields[] = array(
				'label' => 'Show ads on every page.',
				'tags' => 'NAME="inlist_ads_pages_all"',
				'value' => qa_opt('inlist_ads_pages_all'),
				'type' => 'checkbox',
				'note' => 'If this box is checked, ads will be shown on every Question list even on the pages which are created by a plugin and using q_list function.Note that if you tick this option, the below options will not work as it will be shown on every Question list page.',
			);
			$fields[] = array(
				'label' => 'Show ads on Activity page.',
				'tags' => 'NAME="inlist_ads_pages_activity"',
				'value' => qa_opt('inlist_ads_pages_activity'),
				'type' => 'checkbox',
			);
			$fields[] = array(
				'label' => 'Show ads on QA page.',
				'tags' => 'NAME="inlist_ads_pages_qa"',
				'value' => qa_opt('inlist_ads_pages_qa'),
				'type' => 'checkbox',
				
			);
			$fields[] = array(
				'label' => 'Show ads on Questions page.',
				'tags' => 'NAME="inlist_ads_pages_questions"',
				'value' => qa_opt('inlist_ads_pages_questions'),
				'type' => 'checkbox',
				
			);
			$fields[] = array(
				'label' => 'Show ads on Hot page.',
				'tags' => 'NAME="inlist_ads_pages_hot"',
				'value' => qa_opt('inlist_ads_pages_hot'),
				'type' => 'checkbox',
				
			);
			$fields[] = array(
				'label' => 'Show ads on Unanswered page.',
				'tags' => 'NAME="inlist_ads_pages_unanswered"',
				'value' => qa_opt('inlist_ads_pages_unanswered'),
				'type' => 'checkbox',
				
			);
			$fields[] = array(
				'label' => 'Show ads on Tag page.',
				'tags' => 'NAME="inlist_ads_pages_tag"',
				'value' => qa_opt('inlist_ads_pages_tag'),
				'type' => 'checkbox',
				
			);
			$fields[] = array(
				'label' => 'Ad after questions',
				'tags' => 'NAME="inlist_ads_questions"',
				'value' => qa_opt('inlist_ads_questions'),
				'type' => 'text',
				'note' => 'After how many questions the ads will be shown in the list.',
			);

			$fields[] = array(
				'label' => 'HTML Adcode',
				'tags' => 'NAME="inlist_ads_html"',
				'value' => qa_opt('inlist_ads_html'),
				'type' => 'textarea',
				'rows' => '',
				'note' => 'The HTML code of the ad.',
			);
			
		  

			return array(		   
				'ok' => ($ok && !isset($error)) ? $ok : null,
			
				
				'fields' => $fields,
			 
				'buttons' => array(
					array(
						'label' => 'Save',
						'tags' => 'NAME="inlist_ads_save"',
						'note' => 'Powered by Fazley Sabbir',
					)
				),
			);
		}
	}

