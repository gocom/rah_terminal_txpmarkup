<?php

/**
 * Generates HTML markup from supplied Textpattern tag markup.
 *
 * @package   rah_terminal
 * @author    Jukka Svahn
 * @license   GNU GPLv2
 * @link      https://github.com/gocom/rah_terminal_txpmarkup
 *
 * Copyright (C) 2013 Jukka Svahn http://rahforum.biz
 * Licensed under GNU Genral Public License version 2
 * http://www.gnu.org/licenses/gpl-2.0.html
 */

class rah_terminal_txpmarkup
{
	/**
	 * Constructor.
	 */

	public function __construct()
	{
		register_callback(array($this, 'register'), 'rah_terminal', '', 1);
	}

	/**
	 * Registers a terminal option.
	 */

	public function register()
	{
		add_privs('rah_terminal.txpmarkup', '1,2');
		rah_terminal::get()->add_terminal('txpmarkup', 'TXP Markup', array($this, 'process'));
	}

	/**
	 * Processes Textpattern tags.
	 *
	 * @param  string $markup Markup
	 * @return string HTML
	 */

	public function process($markup)
	{
		if (!function_exists('parse'))
		{
			include_once txpath . '/publish.php';
		}

		return parse($markup);
	}
}

new rah_terminal_txpmarkup();