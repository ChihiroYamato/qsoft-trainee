<?php

$aMenuLinks = [
	[
		'О компании',
		'/company/about/',
		[],
		[],
		''
	],
	[
		'Контактная информация',
		'/company/contacts/',
		[],
		[],
		''
	],
	[
		'Отдел продаж',
		'/company/department/',
		[],
		['colore' => 'red'],
		''
	],
	[
		'Финансовый отдел',
		'/company/finances/',
		[],
		[],
		'isset($_SESSION["SESS_AUTH"]["AUTHORIZED"]) && $_SESSION["SESS_AUTH"]["AUTHORIZED"] === "Y"'
	],
	[
		'Для клиентов',
		'/company/clients/',
		[],
		[],
		''
	],
];
