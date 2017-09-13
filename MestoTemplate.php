<?php
/**
 * BaseTemplate class for the Mesto skin
 *
 * @ingroup Skins
 */
class MestoTemplate extends BaseTemplate {
	/**
	 * Outputs the entire contents of the page
	 */
	public function execute() {
		$this->html( 'headelement' );
		?>
	
	<header class="cd-main-header">
     	<a class="cd-logo" href="/"><img src="/skins/Mesto/resources/img/logo.png" alt="Logo"></a>
     	<ul id="addnav" class="cd-header-buttons addnav">
     		
     		<li class="bord"><a class="maillink" href="mailto:mail@orlec.ru">mail@orlec.ru</a></li>
     		<li><a class="cd-search-trigger" href="#cd-search"><span></span></a></li>
     		<li><a class="cd-nav-trigger" href="#cd-primary-nav"><span></span></a></li>
     	</ul> <!-- cd-header-buttons -->	
     </header>
     
     
     
     <nav class="cd-nav">
     		<ul id="cd-primary-nav" class="cd-primary-nav is-fixed ">			
     
     		<li class="has-children">	
     			<?php echo($this->getDropdownNav()); ?>
     		</li>

     		<li class="has-children">	
     			<?php echo($this->getDropdownTool()); ?>
     		</li>

     
     		<li class="mainmenu-link-color white"><a href="/index.php?title=Mediawiki:Новая_Статья">Добавить статью</a>/li>
     		<li class="mainmenu-link-color menuarrow"><a href="/idex.php?title=Mediawiki:Новая_Статья">Добавить новость</a</l>
     		
     		<?php echo($this->getDropdownUser()); ?>
     		

     		</ul> <!-- primary-nav -->
     	</nav> <!-- cd-nav -->
     
     	<div id="cd-search" class="cd-search">
     
			<form action="<?php $this->text( 'wgScript' ) ?>" id="searchform">
			          <input type='hidden' name="title" value="<?php $this->text( 'searchtitle' ) ?>" placeholder="Найти..."/>
			          <?php echo $this->makeSearchInput( array( "id" => "searchInput" ) ); ?>
			</form>

     	</div>   
    
    <div id="mw-page-base" class="noprint"></div>
	<div id="mw-head-base" class="noprint"></div>
     
    <main class="cd-main-content">

        <!-- Content  -->
        <div class="top-news">
      
        	<div class="grid-x grid-margin-x align-middle show-for-medium top-news-container">
        	  <div class="cell shrink">
        	    <ul class="menu socialmenu">
        	      <li><a href="#"><img src="/skins/Mesto/resources/img/twi-small.png" alt=""></a></li>
        	      <li><a href="#"><img src="/skins/Mesto/resources/img/vk-small.png" alt=""></a></li>
        	      <li><a href="#"><img src="/skins/Mesto/resources/img/fb-small.png" alt=""></a></li>
        	      <li><a href="#"></a></li>
        	    </ul>
        	  </div>
        	  <div class="cell auto text-center">

        	    <?php

        	    if ( $this->data['sitenotice'] ) {
					
					echo $this->data['sitenotice'];
				}


        	   ?> 
        	  </div>
       

        	  <div class="cell shrink text-right">
        	    <a href=""><img src="/skins/Mesto/resources/img/telegram.png" alt=""></a>
        	  </div>
        	</div>
      
    	</div>
   <!-- Черновая верстка!-->
        		
   		<?php
   		//$this->html( 'bodycontent' );
   		?>
		<div id="mw-wrapper">
		    <div id="content" class="mw-body" role="main">
				<?php
 
      			foreach ( $this->data['content_actions'] as $key => $tab			 ) {			
      			  echo $this->makeListItem( $key, $tab );
      			}
    

				if ( $this->data['newtalk'] ) {
					echo Html::rawElement(
						'div',
						array( 'class' => 'usermessage' ),
						$this->get( 'newtalk' )
					);
				}
				echo $this->getIndicators();
				echo Html::rawElement(
					'h1',
					array(
						'class' => 'firstHeading',
						'lang' => $this->get( 'pageLanguage' )
					),
					$this->get( 'title' )
				);

				echo Html::rawElement(
					'div',
					array( 'id' => 'siteSub' ),
					$this->getMsg( 'tagline' )->parse()
				);
				?>

				<div id="bodyContent" class="mw-body-content">
					<?php
					echo Html::openElement(
						'div',
						array( 'id' => 'contentSub' )
					);
					if ( $this->data['subtitle'] ) {
						echo Html::rawelement (
							'p',
							[],
							$this->get( 'subtitle' )
						);
					}
					echo Html::rawelement (
						'p',
						[],
						$this->get( 'undelete' )
					);
					echo Html::closeElement( 'div' );

					$this->html( 'bodycontent' );
					$this->clear();
					echo Html::rawElement(
						'div',
						array( 'class' => 'printfooter' ),
						$this->get( 'printfooter' )
					);
					$this->html( 'catlinks' );
					$this->html( 'dataAfterContent' );
					?>
				</div>
			</div>

		</div>


    <div class="main-footer">
      <div class="grid-x grid-padding-x align-middle">
		
		<div class="cell large-4 small-12 columns">
		  <?php
				

				foreach ( $this->getFooterLinks() as $category => $links ) {
					echo Html::openElement(
						'ul',
						array(
							'id' => 'footer-' . Sanitizer::escapeId( $category ),
							'role' => 'contentinfo'
						)
					);
					foreach ( $links as $key ) {
						echo Html::rawElement(
							'li',
							array(
								'id' => 'footer-' . Sanitizer::escapeId( $category . '-' . $key )
							),
							$this->get( $key )
						);
					}
					echo Html::closeElement( 'ul' );
				}
				$this->clear();
		  ?>	
          
        </div>
        
        <div class="cell large-4 small-12 columns footer-center-block">
          	   	
          <p><a href="#">Рекламодателям</a> | <a href="#">О нас</a></p>
          <p>Вы можете <a href="/index.php?title=Mediawiki:Новая_Новость">Написать новость</a> или <a href="/index.php?title=Mediawiki:Новая_Статья">Добавить статью</a></p>


        
        </div>


        <div class="cell large-4 small-12 columns footer-social-link__container">

        <p><b class="eighteen">18+</b></p>
          <p>©2010-<?php echo date("Y");?> «Орлец» с любовью. При поддержке проекта Mesto.</p>	
        <?php
        echo Html::openElement(
					'ul',
					array(
						'id' => 'footer-icons',
						'role' => 'contentinfo'
					)
				);
				foreach ( $this->getFooterIcons( 'icononly' ) as $blockName => $footerIcons ) {
					echo Html::openElement(
						'li',
						array(
							'id' => 'footer-' . Sanitizer::escapeId( $blockName ) . 'ico'
						)
					);
					foreach ( $footerIcons as $icon ) {
						echo $this->getSkin()->makeFooterIcon( $icon );
					}
					echo Html::closeElement( 'li' );
		
				}
		echo Html::closeElement( 'ul' );
		?>
		</div>
        <!--
        <div class="cell large-4 small-12 columns footer-social-link__container">
          <h4>Мы в социальных сетях</h4>
          <ul class="footer-social-link">
            <li><a href="https://vk.com/orlec_ru"><img src="assets/img/vk.svg"></a></li>
            <li><a href="https://twitter.com/orlec_ru"><img src="assets/img/fb.svg"></a></li>
            <li><a href="https://www.facebook.com/orlec.ru"><img src="assets/img/twitter.svg"></a></li>
          </ul>
        </div>
        -->
      </div>
    </div>
    
    </main>




		<?php $this->printTrail() 
		?>

		
		</body>
		</html>

		<?php
	}

	/**
	 * Generates a single sidebar portlet of any kind
	 * @return string html
	 */
	private function getPortlet( $box ) {
		if ( !$box['content'] ) {
			return;
		}

		$html = Html::openElement(
			'div',
			array(
				'role' => 'navigation',
				'class' => 'mw-portlet',
				'id' => Sanitizer::escapeId( $box['id'] )
			) + Linker::tooltipAndAccesskeyAttribs( $box['id'] )
		);
		$html .= Html::element(
			'h3',
			[],
			isset( $box['headerMessage'] ) ? $this->getMsg( $box['headerMessage'] )->text() : $box['header'] );
		if ( is_array( $box['content'] ) ) {
			$html .= Html::openElement( 'ul' );
			foreach ( $box['content'] as $key => $item ) {
				$html .= $this->makeListItem( $key, $item );
			}
			$html .= Html::closeElement( 'ul' );
		} else {
			$html .= $box['content'];
		}
		$html .= Html::closeElement( 'div' );

		return $html;
	}

	private function getDropdownUser() {
		
		$userLinks = $this->getPersonalTools();
		$html = '';

		$usrname = $this->getSkin()->getUser()->getName();
		if ($this->getSkin()->getUser()->isLoggedIn()){
		
			
			if ( is_array( $userLinks ) ) {
				$html = '<li class="has-children"><a>'.$usrname.'</a>	
			    			  <ul class="cd-nav-icons is-hidden">
			    			   <li class="go-back"><a href="#0">Меню</a></li>';
				foreach ( $userLinks as $key => $item ) {
					$item['links'][0]['class'] = "cd-nav-item";  // I think this is't best solution.  
					$html .= $this->makeListItem( $key, $item + ["link-class" => "cd-nav-item"] );
				}
				$html .= '</ul></li>';


			} else {
				$html .= $userLinks;
			}
		}else echo '<li class="bord"><a class="hollow-button" href="/index.php?title=Служебная:Вход&returnto=Заглавная+страница">Войти</a></li>';
		return $html;
	}

	private function getDropdownNav() {
		
		$data = $this->getSidebar();
		
		$nav = $data['navigation']['content'];
		$html = '';
		  
			    if (is_array($nav) ) {
			    	$html = '<a href="http://codyhouse.co/?p=409">Навигация</a>	
			    			  <ul class="cd-nav-icons is-hidden">
			    			   <li class="go-back"><a href="#0">Меню</a></li>';
			    	foreach ( $nav as $key => $item ) {
			    		$html .= $this->makeListItem( $key, $item + ["link-class" => "cd-nav-item"] );
			    	}
			    	$html .= '</ul>';
			    } else {
			    	
			    
			    }
		   
		return $html;
	}

	private function getDropdownTool() {
		
		$data = $this->getSidebar();
		
		$nav = $data['TOOLBOX']['content'];
		$html = '';
		  
			    if (is_array($nav) ) {
			    	$html = '<a href="http://codyhouse.co/?p=409">Инструменты</a>	
			    			  <ul class="cd-nav-icons is-hidden">
			    			   <li class="go-back"><a href="#0">Меню</a></li>';
			    	foreach ( $nav as $key => $item ) {
			    		$html .= $this->makeListItem( $key, $item + ["link-class" => "cd-nav-item"] );
			    	}
			    	$html .= '</ul>';
			    } else {
			    	
			    
			    }
		   
		return $html;
	}

	/**
	 * Generates the logo and (optionally) site title
	 * @return string html
	 */
	private function getLogo( $id = 'p-logo', $imageOnly = false ) {
		$html = Html::openElement(
			'div',
			array(
				'id' => $id,
				'class' => 'mw-portlet',
				'role' => 'banner'
			)
		);
		$html .= Html::element(
			'a',
			array(
				'href' => $this->data['nav_urls']['mainpage']['href'],
				'class' => 'mw-wiki-logo',
			) + Linker::tooltipAndAccesskeyAttribs( 'p-logo' )
		);
		if ( !$imageOnly ) {
			$html .= Html::element(
				'a',
				array(
					'id' => 'p-banner',
					'class' => 'mw-wiki-title',
					'href'=> $this->data['nav_urls']['mainpage']['href']
				) + Linker::tooltipAndAccesskeyAttribs( 'p-logo' ),
				$this->getMsg( 'sitetitle' )->escaped()
			);
		}
		$html .= Html::closeElement( 'div' );

		return $html;
	}

	/**
	 * Generates the search form
	 * @return string html
	 */
	private function getSearch() {
		$html = Html::openElement(
			'form',
			array(
				'action' => htmlspecialchars( $this->get( 'wgScript' ) ),
				'role' => 'search',
				'class' => 'mw-portlet',
				'id' => 'p-search'
			)
		);
		$html .= Html::hidden( 'title', htmlspecialchars( $this->get( 'searchtitle' ) ) );
		$html .= Html::rawelement(
			'h3',
			[],
			Html::label( $this->getMsg( 'search' )->escaped(), 'searchInput' )
		);
		$html .= $this->makeSearchInput( array( 'id' => 'searchInput' ) );
		$html .= $this->makeSearchButton( 'go', array( 'id' => 'searchGoButton', 'class' => 'searchButton' ) );
		$html .= Html::closeElement( 'form' );

		return $html;
	}

	/**
	 * Generates the sidebar
	 * Set the elements to true to allow them to be part of the sidebar
	 * @return string html
	 */
	private function getSiteNavigation() {
		$html = '';

		$sidebar = $this->getSidebar();

		$sidebar['SEARCH'] = false;
		$sidebar['TOOLBOX'] = true;
		$sidebar['LANGUAGES'] = true;

		foreach ( $sidebar as $boxName => $box ) {
			if ( $boxName === false ) {
				continue;
			}
			$html .= $this->getPortlet( $box, true );
		}

		return $html;
	}

	/**
	 * Generates page-related tools/links
	 * @return string html
	 */
	private function getPageLinks() {
		$html = $this->getPortlet( array(
			'id' => 'p-namespaces',
			'headerMessage' => 'namespaces',
			'content' => $this->data['content_navigation']['namespaces'],
		) );
		$html .= $this->getPortlet( array(
			'id' => 'p-variants',
			'headerMessage' => 'variants',
			'content' => $this->data['content_navigation']['variants'],
		) );
		$html .= $this->getPortlet( array(
			'id' => 'p-views',
			'headerMessage' => 'views',
			'content' => $this->data['content_navigation']['views'],
		) );
		$html .= $this->getPortlet( array(
			'id' => 'p-actions',
			'headerMessage' => 'actions',
			'content' => $this->data['content_navigation']['actions'],
		) );

		return $html;
	}

	/**
	 * Generates user tools menu
	 * @return string html
	 */
	private function getUserLinks() {
		return $this->getPortlet( array(
			'id' => 'p-personal',
			'headerMessage' => 'personaltools',
			'content' => $this->getPersonalTools(),
		) );
	}

	/**
	 * Outputs a css clear using the core visualClear class
	 */
	private function clear() {
		echo '<div class="visualClear"></div>';
	}


	private function testData(){
		$nav = $this->data;
		return $nav;
	}
}
