<?php
/**
 * SkinTemplate class for the Mesto skin
 *
 * @ingroup Skins
 */
class SkinMesto extends SkinTemplate {
	public $skinname = 'mesto', $stylename = 'Mesto',
		$template = 'MestoTemplate', $useHeadElement = true;

	/**
	 * Add CSS via ResourceLoader
	 *
	 * @param $out OutputPage
	 */
	public function initPage( OutputPage $out ) {

		$out->addMeta( 'viewport', 'width=device-width, initial-scale=1.0' );

		$out->addModuleStyles( array(
			'mediawiki.skinning.interface',
			'mediawiki.skinning.content.externallinks',
			'skins.mesto'
		) );
		$out->addModules( array(
			'skins.mesto.js'
		) );
	}

	/**
	 * @param $out OutputPage
	 */
	function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );
	}
}
