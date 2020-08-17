<?php
	class fs_inlist_ads_admin {

		function option_default($option) {
			switch($option) {
				case 'demo_ad':
					return 'This is a demo AD by In List Ads Plugin.';
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
					qa_opt('inlist_ads_pages_updates',(bool)qa_post_text('inlist_ads_pages_updates'));
					qa_opt('inlist_ads_pages_tag',(bool)qa_post_text('inlist_ads_pages_tag'));
					if (!empty(qa_post_text('inlist_ads_questions')) || strlen(qa_post_text('inlist_ads_questions')) || !qa_post_text('inlist_ads_questions') == 0) {
					qa_opt('inlist_ads_questions',(int)qa_post_text('inlist_ads_questions'));
					}
					else {$error=1;}
					qa_opt('inlist_ads_category',qa_post_text('inlist_ads_category'));
					if (!empty(qa_post_text('inlist_ads_html')) || strlen(qa_post_text('inlist_ads_html'))) {
					qa_opt('inlist_ads_html',qa_post_text('inlist_ads_html'));
					}
					else {$error=1;}
					
					
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
				'label' => 'Show ads on My Updates page.',
				'tags' => 'NAME="inlist_ads_pages_updates"',
				'value' => qa_opt('inlist_ads_pages_updates'),
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
				'error' => qa_clicked('inlist_ads_save') ? empty(qa_post_text('inlist_ads_questions')) || !strlen(qa_post_text('inlist_ads_questions')) || qa_post_text('inlist_ads_questions') == 0 ? 'This field cannot be empty or zero.' : '' : '',
				
			);
            $fields[] = array(
				'label' => 'The slugs of those categories you want not to show ads on.',
				'tags' => 'NAME="inlist_ads_category"',
				'value' => qa_opt('inlist_ads_category'),
				'type' => 'textarea',
				'rows' => '',
				'note' => 'Provide the slugs of those categories, you want not to show ads on those pages.Please make sure that the slugs are coma(,) separated.Like: slug1,slug2,slug3',
			);
			$fields[] = array(
				'label' => 'HTML Adcode',
				'tags' => 'NAME="inlist_ads_html"',
				'value' => qa_opt('inlist_ads_html'),
				'type' => 'textarea',
				'rows' => '',
				'note' => 'The HTML code of the ad.',
				'error' => qa_clicked('inlist_ads_save') ? empty(qa_post_text('inlist_ads_html')) || !strlen(qa_post_text('inlist_ads_html')) ? 'Ads cannot be empty.' : '' : '',
			);
			
		  

			return array(		   
				'ok' => ($ok && !isset($error)) ? $ok : null,
			
				
				'fields' => $fields,
			 
				'buttons' => array(
					array(
						'label' => 'Save',
						'tags' => 'NAME="inlist_ads_save"',
						'note' => 'Developed by <a href="https://www.facebook.com/fazleysabbir.walker">Fazley Sabbir</a>',
					)
				),
			);
		}
	}

