<?php

/**
* KChat -
* Author Ganesh Kandu
* Contact kanduganesh@gmail.com 
*/

function access($path,$user){
	if($user == 1){
		$user = array(
			'0' => array(
				'install' => 'login'
			)
		);
	}else{
		$user = array(
			'0' => array(
				'settings' => '',
				'install' => 'login'
			),
			'1' => array(
				'ulist' => 'profile',
				'glist' => 'profile',
				'cuser' => 'profile',
			),
		);
	}
	
	$i = 0;
	
	while(isset($path[$i])){
		if(isset($user[$i])){
			if(isset($user[$i][$path[$i]])){
				$path[$i] = $user[$i][$path[$i]];
			}
		}
		$i++;
	}
	return $path;
}

function sitebar_access($data){

	$admin = array(
		'Dashboard' => array(
			'glyphicon' => 'glyphicon glyphicon-dashboard',
			'url' => $data['config']['purl'],
			'menu' => true,
			'active' => "main",
		),
		'Embed Code' => array(
			'glyphicon' => 'glyphicon glyphicon-link',
			'url' => $data['config']['purl'].'/embed',
			'active' => "embed",
			'menu' => true,
			/*'submenu' => array(
				'embed' => array(
					'glyphicon' => 'glyphicon glyphicon-link',
					'url' => $data['config']['purl'].'/embed',
					'menu' => true,
					'active' => "embed",
				),
				'Setting' => array(
					'glyphicon' => 'glyphicon glyphicon-link',
					'url' => $data['config']['purl'].'/embed/setting',
					'menu' => true,
					'active' => "embed",
				)
			)*/
		),
		'Users' => array(
			'glyphicon' => 'glyphicon glyphicon-user',
			'url' => $data['config']['purl'].'/users/profile',
			'active' => "users",
			'submenu' => array(
				'User List' => array(
					'glyphicon' => 'glyphicon glyphicon-comment',
					'url' => $data['config']['purl'].'/users/ulist',
					'menu' => true,
					'active' => "users",
				),
				'Guest List' => array(
					'glyphicon' => 'glyphicon glyphicon-comment',
					'url' => $data['config']['purl'].'/users/glist',
					'menu' => true,
					'active' => "users",
				),
				'Create User' => array(
					'glyphicon' => 'glyphicon glyphicon-comment',
					'url' => $data['config']['purl'].'/users/cuser',
					'menu' => true,
					'active' => "users",
				),
				'profile' => array(
					'glyphicon' => 'glyphicon glyphicon-comment',
					'url' => $data['config']['purl'].'/users/profile',
					'menu' => true,
					'active' => "users",
				),
				'group chat' => array(
					'glyphicon' => 'glyphicon glyphicon-user',
					'url' => $data['config']['purl'].'/users/groups',
					'menu' => true,
					'active' => "users",
				)
			)
		),
		'Messages' => array(
			'glyphicon' => 'glyphicon glyphicon-comment',
			'url' => $data['config']['purl'].'/msgs',
			'menu' => true,
			'active' => "msgs",
		),
		'Settings' => array(
			'glyphicon' => 'glyphicon glyphicon-comment',
			'url' => $data['config']['purl'].'/settings',
			'menu' => true,
			'active' => "settings",
		),
		'Logout' => array(
			'glyphicon' => 'glyphicon glyphicon-off',
			'url' => 'javascript:void(0)',
			'menu' => true,
			'id' => 'logout2'
		)
	);

	$users = array(
		'Dashboard' => array(
			'glyphicon' => 'glyphicon glyphicon-dashboard',
			'url' => $data['config']['purl'],
			'menu' => true,
			'active' => "main",
		),
		'profile' => array(
			'glyphicon' => 'glyphicon glyphicon-user',
			'url' => $data['config']['purl'].'/users/profile',
			'menu' => true,
			'active' => "users",
		),
		'group' => array(
			'glyphicon' => 'glyphicon glyphicon-user',
			'url' => $data['config']['purl'].'/users/groups',
			'menu' => true,
			'active' => "users",
		),
		'Messages' => array(
			'glyphicon' => 'glyphicon glyphicon-comment',
			'url' => $data['config']['purl'].'/msgs',
			'menu' => true,
			'active' => "msgs",
		),
		'Logout' => array(
			'glyphicon' => 'glyphicon glyphicon-off',
			'url' => 'javascript:void(0)',
			'menu' => true,
			'id' => 'logout2'
		)
	);
		
	if($data['user']['role'] == 1){
		$data['sitebar'] = $admin;
	}else{
		$data['sitebar'] = $users;
	}
	
	return $data;
}