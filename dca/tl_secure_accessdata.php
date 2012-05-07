<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Daniel Kiesel 2011 
 * @author     Daniel Kiesel 
 * @package    secure_accessdata 
 * @license    LGPL 
 * @filesource
 */


/**
 * Table tl_secure_accessdata 
 */
$GLOBALS['TL_DCA']['tl_secure_accessdata'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'				=> 'Table',
		'enableVersioning'			=> true,
		'onload_callback'			=> array(
											array('tl_secure_accessdata', 'onload_callback')
										)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'					=> 2,
			'fields'				=> array('type', 'access_title'),
			'flag'					=> 11
		),
		'label' => array
		(
			'fields'				=> array('access_title'),
			'format'				=> '%s',
			'label_callback'		=> array('tl_secure_accessdata', 'label_callback')
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'				=> &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'				=> 'act=select',
				'class'				=> 'header_edit_all',
				'attributes'		=> 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'				=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['edit'],
				'href'				=> 'act=edit',
				'icon'				=> 'edit.gif'
			),
			'copy' => array
			(
				'label'				=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['copy'],
				'href'				=> 'act=copy',
				'icon'				=> 'copy.gif'
			),
			'delete' => array
			(
				'label'				=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['delete'],
				'href'				=> 'act=delete',
				'icon'				=> 'delete.gif',
				'attributes'		=> 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'				=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['show'],
				'href'				=> 'act=show',
				'icon'				=> 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'				=> array('type', 'protect'),
		'default'					=> '{title_legend},access_title,type,author;
										{protect_legend},protect;
										{info_legend},info',
		'contao_login'				=> '{title_legend},access_title,type,author;
										{contao_legend},contao_user,contao_pwd,contao_install_pwd;
										{protect_legend},protect;
										{info_legend},info',
		'weblogin'					=> '{title_legend},access_title,type,author;
										{weblogin_legend},weblogin_url,weblogin_name,weblogin_pwd;
										{protect_legend},protect;
										{info_legend},info',
		'mail'						=> '{title_legend},access_title,type,author;
										{mail_legend},mail_name,mail_email,mail_loginname,mail_pwd,mail_crypt;
										{mail_smtp_legend},mail_smtp_host,mail_smtp_port;
										{mail_imap_legend},mail_imap_host,mail_imap_port;
										{mail_pop_legend},mail_pop_host,mail_pop_port;
										{protect_legend},protect;
										{info_legend},info',
		'project'					=> '{title_legend},access_title,type,author;
										{contao_legend},contao_user,contao_pwd,contao_install_pwd;
										{webadmin_legend},webadmin_url,webadmin_name,webadmin_pwd;
										{local_legend},local_url,local_root;
										{local_db_legend},local_db_server,local_db_name,local_db_user,local_db_pwd,local_db_charset,local_db_port;
										{preview_legend},preview_url,preview_root;
										{preview_db_legend},preview_db_server,preview_db_name,preview_db_user,preview_db_pwd,preview_db_charset,preview_db_port;
										{preview_ftp_legend},preview_ftp_server,preview_ftp_user,preview_ftp_pwd,preview_ftp_protocol,preview_ftp_port;
										{preview_ssh_legend},preview_ssh_server,preview_ssh_port,preview_ssh_user,preview_ssh_pwd;
										{online_legend},online_url,online_root;
										{online_db_legend},online_db_server,online_db_name,online_db_user,online_db_pwd,online_db_charset,online_db_port;
										{online_ftp_legend},online_ftp_server,online_ftp_user,online_ftp_pwd,online_ftp_protocol,online_ftp_port;
										{online_ssh_legend},online_ssh_server,online_ssh_port,online_ssh_user,online_ssh_pwd;
										{protect_legend},protect;
										{info_legend},info',
		'online_project'			=> '{title_legend},access_title,type,author;
										{webadmin_legend},webadmin_url,webadmin_name,webadmin_pwd;
										{contao_legend},contao_user,contao_pwd,contao_install_pwd;
										{online_legend},online_url,online_root;
										{online_db_legend},online_db_server,online_db_name,online_db_user,online_db_pwd,online_db_charset,online_db_port;
										{online_ftp_legend},online_ftp_server,online_ftp_user,online_ftp_pwd,online_ftp_protocol,online_ftp_port;
										{online_ssh_legend},online_ssh_server,online_ssh_port,online_ssh_user,online_ssh_pwd;
										{protect_legend},protect;
										{info_legend},info'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'protect'					=> 'protect_users,protect_groups'
	),

	// Fields
	'fields' => array
	(
		'access_title' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['access_title'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'mandatory'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'type' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['type'],
			'default'				=> 'contao_login',
			'exclude'				=> true,
			'inputType'				=> 'select',
			'options'				=> $GLOBALS['TL_SADTY'],
			'reference'				=> &$GLOBALS['TL_LANG']['SADTY'],
			'eval'					=> array('helpwizard'=>true, 'submitOnChange'=>true, 'tl_class'=>'w50')
		),
		'author' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['author'],
			'default'				=> $this->User->id,
			'exclude'				=> true,
			'inputType'				=> 'select',
			'foreignKey'			=> 'tl_user.name',
			'eval'					=> array('encrypt'=>true, 'doNotCopy'=>true, 'mandatory'=>true, 'includeBlankOption'=>false, 'tl_class'=>'w50')
		),
		'protect' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['protect'],
			'exclude'				=> true,
			'inputType'				=> 'checkbox',
			'eval'					=> array('encrypt'=>true, 'submitOnChange'=>true)
		),
		'protect_users' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['protect_users'],
			'exclude'				=> true,
			'filter'				=> true,
			'inputType'				=> 'checkbox',
			'foreignKey'			=> 'tl_user.name',
			'eval'					=> array('encrypt'=>true, 'multiple'=>true, 'tl_class'=>'w50')
		),
		'protect_groups' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['protect_groups'],
			'exclude'				=> true,
			'filter'				=> true,
			'inputType'				=> 'checkbox',
			'foreignKey'			=> 'tl_user_group.name',
			'eval'					=> array('encrypt'=>true, 'multiple'=>true, 'tl_class'=>'w50')
		),
		'info' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['info'],
			'exclude'				=> true,
			'inputType'				=> 'textarea',
			'eval'					=> array('encrypt'=>true)
		),
		
		/* Weblogin */
		'weblogin_url' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['weblogin_url'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'tl_class'=>'long')
		),
		'weblogin_name' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['weblogin_name'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'weblogin_pwd' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['weblogin_pwd'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		
		/* Contao */
		'contao_user' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['contao_user'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'contao_pwd' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['contao_pwd'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'contao_install_pwd' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['contao_install_pwd'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		
		/* Local */
		'local_url' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['url'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'tl_class'=>'long')
		),
		'local_root' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['root'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'tl_class'=>'long')
		),
		'local_db_server' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_server'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'default'				=> 'localhost',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'local_db_name' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_name'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'local_db_user' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_user'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'local_db_pwd' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_pwd'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'local_db_charset' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_charset'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'default'				=> 'UTF-8',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>8, 'tl_class'=>'w50')
		),
		'local_db_port' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_port'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'default'				=> '3306',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>4, 'tl_class'=>'w50')
		),
		
		/* Preview */
		'preview_url' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['url'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'tl_class'=>'long')
		),
		'preview_root' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['root'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'tl_class'=>'long')
		),
		'preview_db_server' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_server'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'default'				=> 'localhost',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'preview_db_name' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_name'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'preview_db_user' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_user'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'preview_db_pwd' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_pwd'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'preview_db_charset' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_charset'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'default'				=> 'UTF-8',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>8, 'tl_class'=>'w50')
		),
		'preview_db_port' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_port'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'default'				=> '3306',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>4, 'tl_class'=>'w50')
		),
		'preview_ftp_server' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_server'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'preview_ftp_user' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_user'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'preview_ftp_pwd' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_pwd'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'preview_ftp_protocol' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_protocol'],
			'exclude'				=> true,
			'inputType'				=> 'select',
			'eval'					=> array('tl_class'=>'w50'),
			'options'				=> $GLOBALS['TL_SAD_FTP_PROTOCOL'],
			'reference'				=> &$GLOBALS['TL_LANG']['SAD_FTP_PROTOCOL']
		),
		'preview_ftp_port' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_port'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'default'				=> '21',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>4, 'tl_class'=>'w50')
		),
		'preview_ssh_server' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ssh_server'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'preview_ssh_port' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ssh_port'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'default'				=> '22',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>4, 'tl_class'=>'w50')
		),
		'preview_ssh_user' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ssh_user'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'preview_ssh_pwd' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ssh_pwd'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		
		/* Online */
		'online_url' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['url'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'tl_class'=>'long')
		),
		'online_root' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['root'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'tl_class'=>'long')
		),
		'online_db_server' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_server'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'default'				=> 'localhost',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'online_db_name' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_name'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'online_db_user' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_user'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'online_db_pwd' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_pwd'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'online_db_charset' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_charset'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'default'				=> 'UTF-8',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>8, 'tl_class'=>'w50')
		),
		'online_db_port' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['db_port'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'default'				=> '3306',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>4, 'tl_class'=>'w50')
		),
		'online_ftp_server' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_server'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'online_ftp_user' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_user'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'online_ftp_pwd' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_pwd'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'online_ftp_protocol' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_protocol'],
			'exclude'				=> true,
			'inputType'				=> 'select',
			'options'				=> $GLOBALS['TL_SAD_FTP_PROTOCOL'],
			'reference'				=> &$GLOBALS['TL_LANG']['SAD_FTP_PROTOCOL'],
			'eval'					=> array('encrypt'=>true, 'tl_class'=>'w50')
		),
		'online_ftp_port' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ftp_port'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'default'				=> '21',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>4, 'tl_class'=>'w50')
		),
		'online_ssh_server' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ssh_server'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'online_ssh_port' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ssh_port'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'default'				=> '22',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>4, 'tl_class'=>'w50')
		),
		'online_ssh_user' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ssh_user'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'online_ssh_pwd' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['ssh_pwd'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		
		/* Webadmin */
		'webadmin_url' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['webadmin_url'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'tl_class'=>'long')
		),
		'webadmin_name' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['webadmin_name'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'webadmin_pwd' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['webadmin_pwd'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		
		/* Mail */
		'mail_name' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_name'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'mail_email' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_email'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'rgxp'=>'email', 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'mail_loginname' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_loginname'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'mail_pwd' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_pwd'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'mail_crypt' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_crypt'],
			'exclude'				=> true,
			'inputType'				=> 'select',
			'options'				=> $GLOBALS['TL_SAD_MAIL_CRYPT'],
			'eval'					=> array('encrypt'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50')
		),
		'mail_smtp_host' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_smtp_host'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'mail_smtp_port' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_smtp_port'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'default'				=> '25',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'mail_imap_host' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_imap_host'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'mail_imap_port' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_imap_port'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'default'				=> '993',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'mail_pop_host' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_pop_host'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		),
		'mail_pop_port' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_secure_accessdata']['mail_pop_port'],
			'exclude'				=> true,
			'inputType'				=> 'text',
			'default'				=> '995',
			'eval'					=> array('encrypt'=>true, 'maxlength'=>120, 'tl_class'=>'w50')
		)
	)
);


class tl_secure_accessdata extends Backend
{
	public function __construct()
	{
		$this->import('Database');
		$this->import('Encryption');
		$this->import('BackendUser', 'User');
	}
	
	
	public function onload_callback(DataContainer $dc)
	{
		$arrEntries = array(0);
		
		// Get all secure accessdata results
		$objSecureAccessdata = $this->Database->prepare("SELECT * FROM tl_secure_accessdata")
								->execute();
		
		while($objSecureAccessdata->fetchAssoc())
		{
			$id = $objSecureAccessdata->id;
			$author = $this->Encryption->decrypt($objSecureAccessdata->author);
			$protect = $this->Encryption->decrypt($objSecureAccessdata->protect);
			$protect_users = deserialize($objSecureAccessdata->protect_users);
			$protect_groups = deserialize($objSecureAccessdata->protect_groups);
			
			// If not protect
			if($protect != 1)
			{
				$arrEntries[] = $id;
				continue;
			}
			
			// If user is admin
			if($this->User->admin == 1)
			{
				$arrEntries[] = $id;
				continue;
			}
			
			// If user is author
			if($this->User->id == $author)
			{
				$arrEntries[] = $id;
				continue;
			}
			
			// If user is in user array
			for($i=0; count($protect_users)>$i; $i++)
			{
				if($this->User->id == $this->Encryption->decrypt($protect_users[$i]))
				{
					$arrEntries[] = $id;
					continue;
				}
			}
			
			// If a group from user exists in group array
			for($i=0; count($protect_groups)>$i; $i++)
			{
				$protectGroup = $this->Encryption->decrypt($protect_groups[$i]);
				
				if(!empty($protectGroup) && $protectGroup!=NULL)
				{
					foreach($this->User->groups as $userGroup)
					{
						if(!empty($userGroup) && $userGroup!=NULL)
						{
							if($userGroup == $protectGroup)
							{
								$arrEntries[] = $id;
								continue;
							}
						}
					}
				}
			}
		}
		
		// Generate filter
		for($i=0; count($arrEntries)>$i; $i++)
		{
			if($i==0)
			{
				$filter = 'id='.$arrEntries[$i];
			}
			else
			{
				$filter .= ' || id='.$arrEntries[$i];
			}
		}
		
		// Set filter
		$GLOBALS['TL_DCA']['tl_secure_accessdata']['list']['sorting']['filter'][0] = array($filter);
	}
	
	
	public function label_callback($row, $label)
	{
		if($this->Encryption->decrypt($row['protect']) == 1)
		{
			$label_UnG = '';
			
			$users = $this->Encryption->decrypt(deserialize($row['protect_users']));
			$groups = $this->Encryption->decrypt(deserialize($row['protect_groups']));
			
			if(!empty($users) && count($users)>0)
			{
				$label_UnG .= sprintf('<img src="system/themes/default/images/user.gif" alt="%s" style="border: 0;">', $GLOBALS['TL_LANG']['tl_secure_accessdata']['label_callback_protect_users']);
			}
			
			if(!empty($groups) && count($groups)>0)
			{
				$label_UnG .= sprintf('<img src="system/themes/default/images/group.gif" alt="%s" style="border: 0;">', $GLOBALS['TL_LANG']['tl_secure_accessdata']['label_callback_protect_groups']);
			}
			
			$label .= ' - '.$GLOBALS['TL_LANG']['tl_secure_accessdata']['label_callback_protect'];
			
			if(!empty($label_UnG))
			{
				$label .= ' ('.$label_UnG.')';
			}
		}
		
		return $label;
	}
}

?>