<?php

return array(
		
	//'/' 							            => '//landing/index',

	'home' 							            => '//site/index',

    'intro' 						            => '//landing/index',
    'teaser'                                    => '//landing/index',
    'dangkynhanh'                               => '//landing/index',

    'gallery'                                   => '//album',
    'gallery/<action:\w+>'                      => '//album/<action>',

    'play'                                      => '//play',
    'play/<action:\w+>'                         => '//play/<action>',

    'gift-code'                                 => '//giftCode/index',
    'gift-code/<id:[\d]+>-<slug:[\w\d\-]+>'     => '//giftCode/view',

    'huong-dan-nhan-gift-code'                  => '//article/view/id/113',
    'ho-tro'                                    => '//article/view/id/49',
    'uu-dai-vip'                                => '//article/view/id/50',
    'quy-dinh'                                  => '//article/view/id/51',
    'bi-kip'                                    => '//article/category/slug/bi-kip',
    'cam-nang-tan-thu'                          => '//article/category/slug/tan-thu',

    'nhan-vat/da-xoa'                           => '//article/category/slug/nhan-vat/active/da-xoa',
    'nhan-vat/tu-la'                            => '//article/category/slug/nhan-vat/active/tu-la',
    'nhan-vat/long-cung'                        => '//article/category/slug/nhan-vat/active/long-cung',

    'news/<id:[\d]+>-<slug:[\w\d\-]+>'          => '//article/view',
    'news/*'                                    => '//article',
    'gallery'                                   => '//album/index',
    'user'                                      => '//site/index',
    'server'                                    => '//play/index',

    'hailoc' => '//gameLucky/hailoc',
    'hailoc/phanthuong' => '//gameLucky/phanthuong',
    'hailoc/quydinh' => '//gameLucky/quydinh',
    'hailoc/thele' => '//gameLucky/theLe',
    'hailoc/ruongloc' => '//gameLucky/ruongloc',
    'hailoc/choingay' => '//gameLucky/hailoc',
);