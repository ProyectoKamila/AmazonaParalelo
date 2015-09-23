<?php
/**
 * This file belongs to the YIT Plugin Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! class_exists( 'YIT_Plugin_Common' ) ) :

/**
 * Core configuration class
 *
 * @since 1.0.0
 */
class YIT_Plugin_Common {

    /**
     * Config array
     *
     * @var array
     */
    protected static $_config = array(
        'slider'             => array( 'nivo', 'elegant' ),


        'awesome_icons'      => array(
            'f042' => 'adjust',
            'f170' => 'adn',
            'f037' => 'align-center',
            'f039' => 'align-justify',
            'f036' => 'align-left',
            'f038' => 'align-right',
            'f0f9' => 'ambulance',
            'f13d' => 'anchor',
            'f17b' => 'android',
            'f103' => 'angle-double-down',
            'f100' => 'angle-double-left',
            'f101' => 'angle-double-right',
            'f102' => 'angle-double-up',
            'f107' => 'angle-down',
            'f104' => 'angle-left',
            'f105' => 'angle-right',
            'f106' => 'angle-up',
            'f179' => 'apple',
            'f187' => 'archive',
            'f0ab' => 'arrow-circle-down',
            'f0a8' => 'arrow-circle-left',
            'f01a' => 'arrow-circle-o-down',
            'f190' => 'arrow-circle-o-left',
            'f18e' => 'arrow-circle-o-right',
            'f01b' => 'arrow-circle-o-up',
            'f0a9' => 'arrow-circle-right',
            'f0aa' => 'arrow-circle-up',
            'f063' => 'arrow-down',
            'f060' => 'arrow-left',
            'f061' => 'arrow-right',
            'f062' => 'arrow-up',
            'f047' => 'arrows',
            'f0b2' => 'arrows-alt',
            'f07e' => 'arrows-h',
            'f07d' => 'arrows-v',
            'f069' => 'asterisk',
            'f04a' => 'backward',
            'f05e' => 'ban',
            'f080' => 'bar-chart-o',
            'f02a' => 'barcode',
            'f0c9' => 'bars',
            'f0fc' => 'beer',
            'f0f3' => 'bell',
            'f0a2' => 'bell-o',
            'f171' => 'bitbucket',
            'f172' => 'bitbucket-square',
            'f032' => 'bold',
            'f0e7' => 'bolt',
            'f02d' => 'book',
            'f02e' => 'bookmark',
            'f097' => 'bookmark-o',
            'f0b1' => 'briefcase',
            'f15a' => 'btc',
            'f188' => 'bug',
            'f0f7' => 'building-o',
            'f0a1' => 'bullhorn',
            'f140' => 'bullseye',
            'f073' => 'calendar',
            'f133' => 'calendar-o',
            'f030' => 'camera',
            'f083' => 'camera-retro',
            'f0d7' => 'caret-down',
            'f0d9' => 'caret-left',
            'f0da' => 'caret-right',
            'f150' => 'caret-square-o-down',
            'f191' => 'caret-square-o-left',
            'f152' => 'caret-square-o-right',
            'f151' => 'caret-square-o-up',
            'f0d8' => 'caret-up',
            'f0a3' => 'certificate',
            'f127' => 'chain-broken',
            'f00c' => 'check',
            'f058' => 'check-circle',
            'f05d' => 'check-circle-o',
            'f14a' => 'check-square',
            'f046' => 'check-square-o',
            'f13a' => 'chevron-circle-down',
            'f137' => 'chevron-circle-left',
            'f138' => 'chevron-circle-right',
            'f139' => 'chevron-circle-up',
            'f078' => 'chevron-down',
            'f053' => 'chevron-left',
            'f054' => 'chevron-right',
            'f077' => 'chevron-up',
            'f10c' => 'circle-o',
            'f0ea' => 'clipboard',
            'f017' => 'clock-o',
            'f0c2' => 'cloud',
            'f0ed' => 'cloud-download',
            'f0ee' => 'cloud-upload',
            'f121' => 'code',
            'f126' => 'code-fork',
            'f0f4' => 'coffee',
            'f013' => 'cog',
            'f085' => 'cogs',
            'f0db' => 'columns',
            'f075' => 'comment',
            'f0e5' => 'comment-o',
            'f086' => 'comments',
            'f0e6' => 'comments-o',
            'f14e' => 'compass',
            'f066' => 'compress',
            'f09d' => 'credit-card',
            'f125' => 'crop',
            'f05b' => 'crosshairs',
            'f13c' => 'css3',
            'f0f5' => 'cutlery',
            'f108' => 'desktop',
            'f192' => 'dot-circle-o',
            'f019' => 'download',
            'f17d' => 'dribbble',
            'f16b' => 'dropbox',
            'f052' => 'eject',
            'f141' => 'ellipsis-h',
            'f142' => 'ellipsis-v',
            'f0e0' => 'envelope',
            'f003' => 'envelope-o',
            'f12d' => 'eraser',
            'f153' => 'eur',
            'f0ec' => 'exchange',
            'f12a' => 'exclamation',
            'f06a' => 'exclamation-circle',
            'f071' => 'exclamation-triangle',
            'f065' => 'expand',
            'f08e' => 'external-link',
            'f14c' => 'external-link-square',
            'f06e' => 'eye',
            'f070' => 'eye-slash',
            'f09a' => 'facebook',
            'f082' => 'facebook-square',
            'f049' => 'fast-backward',
            'f050' => 'fast-forward',
            'f182' => 'female',
            'f0fb' => 'fighter-jet',
            'f15b' => 'file',
            'f016' => 'file-o',
            'f15c' => 'file-text',
            'f0f6' => 'file-text-o',
            'f0c5' => 'files-o',
            'f008' => 'film',
            'f0b0' => 'filter',
            'f06d' => 'fire',
            'f134' => 'fire-extinguisher',
            'f024' => 'flag',
            'f11e' => 'flag-checkered',
            'f11d' => 'flag-o',
            'f0c3' => 'flask',
            'f16e' => 'flickr',
            'f0c7' => 'floppy-o',
            'f07b' => 'folder',
            'f114' => 'folder-o',
            'f07c' => 'folder-open',
            'f115' => 'folder-open-o',
            'f031' => 'font',
            'f04e' => 'forward',
            'f180' => 'foursquare',
            'f119' => 'frown-o',
            'f11b' => 'gamepad',
            'f0e3' => 'gavel',
            'f154' => 'gbp',
            'f06b' => 'gift',
            'f09b' => 'github',
            'f113' => 'github-alt',
            'f092' => 'github-square',
            'f184' => 'gittip',
            'f000' => 'glass',
            'f0ac' => 'globe',
            'f0d5' => 'google-plus',
            'f0d4' => 'google-plus-square',
            'f0fd' => 'h-square',
            'f0a7' => 'hand-o-down',
            'f0a5' => 'hand-o-left',
            'f0a4' => 'hand-o-right',
            'f0a6' => 'hand-o-up',
            'f0a0' => 'hdd-o',
            'f025' => 'headphones',
            'f004' => 'heart',
            'f08a' => 'heart-o',
            'f015' => 'home',
            'f0f8' => 'hospital-o',
            'f13b' => 'html5',
            'f01c' => 'inbox',
            'f03c' => 'indent',
            'f129' => 'info',
            'f05a' => 'info-circle',
            'f156' => 'inr',
            'f16d' => 'instagram',
            'f033' => 'italic',
            'f157' => 'jpy',
            'f084' => 'key',
            'f11c' => 'keyboard-o',
            'f159' => 'krw',
            'f109' => 'laptop',
            'f06c' => 'leaf',
            'f094' => 'lemon-o',
            'f149' => 'level-down',
            'f148' => 'level-up',
            'f0eb' => 'lightbulb-o',
            'f0c1' => 'link',
            'f0e1' => 'linkedin',
            'f08c' => 'linkedin-square',
            'f17c' => 'linux',
            'f03a' => 'list',
            'f022' => 'list-alt',
            'f0cb' => 'list-ol',
            'f0ca' => 'list-ul',
            'f124' => 'location-arrow',
            'f023' => 'lock',
            'f175' => 'long-arrow-down',
            'f177' => 'long-arrow-left',
            'f178' => 'long-arrow-right',
            'f176' => 'long-arrow-up',
            'f0d0' => 'magic',
            'f076' => 'magnet',
            'f122' => 'mail-reply-all',
            'f183' => 'male',
            'f041' => 'map-marker',
            'f136' => 'maxcdn',
            'f0fa' => 'medkit',
            'f11a' => 'meh-o',
            'f130' => 'microphone',
            'f131' => 'microphone-slash',
            'f068' => 'minus',
            'f056' => 'minus-circle',
            'f146' => 'minus-square',
            'f147' => 'minus-square-o',
            'f10b' => 'mobile',
            'f0d6' => 'money',
            'f186' => 'moon-o',
            'f001' => 'music',
            'f03b' => 'outdent',
            'f18c' => 'pagelines',
            'f0c6' => 'paperclip',
            'f04c' => 'pause',
            'f040' => 'pencil',
            'f14b' => 'pencil-square',
            'f044' => 'pencil-square-o',
            'f095' => 'phone',
            'f098' => 'phone-square',
            'f03e' => 'picture-o',
            'f0d2' => 'pinterest',
            'f0d3' => 'pinterest-square',
            'f072' => 'plane',
            'f04b' => 'play',
            'f144' => 'play-circle',
            'f01d' => 'play-circle-o',
            'f067' => 'plus',
            'f055' => 'plus-circle',
            'f0fe' => 'plus-square',
            'f196' => 'plus-square-o',
            'f011' => 'power-off',
            'f02f' => 'print',
            'f12e' => 'puzzle-piece',
            'f029' => 'qrcode',
            'f128' => 'question',
            'f059' => 'question-circle',
            'f10d' => 'quote-left',
            'f10e' => 'quote-right',
            'f074' => 'random',
            'f021' => 'refresh',
            'f18b' => 'renren',
            'f01e' => 'repeat',
            'f112' => 'reply',
            'f122' => 'reply-all',
            'f079' => 'retweet',
            'f018' => 'road',
            'f135' => 'rocket',
            'f09e' => 'rss',
            'f143' => 'rss-square',
            'f158' => 'rub',
            'f0c4' => 'scissors',
            'f002' => 'search',
            'f010' => 'search-minus',
            'f00e' => 'search-plus',
            'f064' => 'share',
            'f14d' => 'share-square',
            'f045' => 'share-square-o',
            'f132' => 'shield',
            'f07a' => 'shopping-cart',
            'f090' => 'sign-in',
            'f08b' => 'sign-out',
            'f012' => 'signal',
            'f0e8' => 'sitemap',
            'f17e' => 'skype',
            'f118' => 'smile-o',
            'f0dc' => 'sort',
            'f15d' => 'sort-alpha-asc',
            'f15e' => 'sort-alpha-desc',
            'f160' => 'sort-amount-asc',
            'f161' => 'sort-amount-desc',
            'f0dd' => 'sort-asc',
            'f0de' => 'sort-desc',
            'f162' => 'sort-numeric-asc',
            'f163' => 'sort-numeric-desc',
            'f110' => 'spinner',
            'f0c8' => 'square',
            'f096' => 'square-o',
            'f18d' => 'stack-exchange',
            'f16c' => 'stack-overflow',
            'f005' => 'star',
            'f089' => 'star-half',
            'f123' => 'star-half-o',
            'f006' => 'star-o',
            'f048' => 'step-backward',
            'f051' => 'step-forward',
            'f0f1' => 'stethoscope',
            'f04d' => 'stop',
            'f0cc' => 'strikethrough',
            'f12c' => 'subscript',
            'f0f2' => 'suitcase',
            'f185' => 'sun-o',
            'f12b' => 'superscript',
            'f0ce' => 'table',
            'f10a' => 'tablet',
            'f0e4' => 'tachometer',
            'f02b' => 'tag',
            'f02c' => 'tags',
            'f0ae' => 'tasks',
            'f120' => 'terminal',
            'f034' => 'text-height',
            'f035' => 'text-width',
            'f00a' => 'th',
            'f009' => 'th-large',
            'f00b' => 'th-list',
            'f08d' => 'thumb-tack',
            'f165' => 'thumbs-down',
            'f088' => 'thumbs-o-down',
            'f087' => 'thumbs-o-up',
            'f164' => 'thumbs-up',
            'f145' => 'ticket',
            'f00d' => 'times',
            'f057' => 'times-circle',
            'f05c' => 'times-circle-o',
            'f043' => 'tint',
            'f014' => 'trash-o',
            'f181' => 'trello',
            'f091' => 'trophy',
            'f0d1' => 'truck',
            'f195' => 'try',
            'f173' => 'tumblr',
            'f174' => 'tumblr-square',
            'f099' => 'twitter',
            'f081' => 'twitter-square',
            'f0e9' => 'umbrella',
            'f0cd' => 'underline',
            'f0e2' => 'undo',
            'f09c' => 'unlock',
            'f13e' => 'unlock-alt',
            'f093' => 'upload',
            'f155' => 'usd',
            'f007' => 'user',
            'f0f0' => 'user-md',
            'f0c0' => 'users',
            'f03d' => 'video-camera',
            'f194' => 'vimeo-square',
            'f189' => 'vk',
            'f027' => 'volume-down',
            'f026' => 'volume-off',
            'f028' => 'volume-up',
            'f18a' => 'weibo',
            'f193' => 'wheelchair',
            'f17a' => 'windows',
            'f0ad' => 'wrench',
            'f168' => 'xing',
            'f169' => 'xing-square',
            'f167' => 'youtube',
            'f16a' => 'youtube-play',
            'f166' => 'youtube-square'
        ),
        'awesome_icons2'      => array(
            '\f042' => 'adjust',
            '\f170' => 'adn',
            '\f037' => 'align-center',
            '\f039' => 'align-justify',
            '\f036' => 'align-left',
            '\f038' => 'align-right',
            '\f0f9' => 'ambulance',
            '\f13d' => 'anchor',
            '\f17b' => 'android',
            '\f103' => 'angle-double-down',
            '\f100' => 'angle-double-left',
            '\f101' => 'angle-double-right',
            '\f102' => 'angle-double-up',
            '\f107' => 'angle-down',
            '\f104' => 'angle-left',
            '\f105' => 'angle-right',
            '\f106' => 'angle-up',
            '\f179' => 'apple',
            '\f187' => 'archive',
            '\f0ab' => 'arrow-circle-down',
            '\f0a8' => 'arrow-circle-left',
            '\f01a' => 'arrow-circle-o-down',
            '\f190' => 'arrow-circle-o-left',
            '\f18e' => 'arrow-circle-o-right',
            '\f01b' => 'arrow-circle-o-up',
            '\f0a9' => 'arrow-circle-right',
            '\f0aa' => 'arrow-circle-up',
            '\f063' => 'arrow-down',
            '\f060' => 'arrow-left',
            '\f061' => 'arrow-right',
            '\f062' => 'arrow-up',
            '\f047' => 'arrows',
            '\f0b2' => 'arrows-alt',
            '\f07e' => 'arrows-h',
            '\f07d' => 'arrows-v',
            '\f069' => 'asterisk',
            '\f04a' => 'backward',
            '\f05e' => 'ban',
            '\f080' => 'bar-chart-o',
            '\f02a' => 'barcode',
            '\f0c9' => 'bars',
            '\f0fc' => 'beer',
            '\f0f3' => 'bell',
            '\f0a2' => 'bell-o',
            '\f171' => 'bitbucket',
            '\f172' => 'bitbucket-square',
            '\f032' => 'bold',
            '\f0e7' => 'bolt',
            '\f02d' => 'book',
            '\f02e' => 'bookmark',
            '\f097' => 'bookmark-o',
            '\f0b1' => 'briefcase',
            '\f15a' => 'btc',
            '\f188' => 'bug',
            '\f0f7' => 'building-o',
            '\f0a1' => 'bullhorn',
            '\f140' => 'bullseye',
            '\f073' => 'calendar',
            '\f133' => 'calendar-o',
            '\f030' => 'camera',
            '\f083' => 'camera-retro',
            '\f0d7' => 'caret-down',
            '\f0d9' => 'caret-left',
            '\f0da' => 'caret-right',
            '\f150' => 'caret-square-o-down',
            '\f191' => 'caret-square-o-left',
            '\f152' => 'caret-square-o-right',
            '\f151' => 'caret-square-o-up',
            '\f0d8' => 'caret-up',
            '\f0a3' => 'certificate',
            '\f127' => 'chain-broken',
            '\f00c' => 'check',
            '\f058' => 'check-circle',
            '\f05d' => 'check-circle-o',
            '\f14a' => 'check-square',
            '\f046' => 'check-square-o',
            '\f13a' => 'chevron-circle-down',
            '\f137' => 'chevron-circle-left',
            '\f138' => 'chevron-circle-right',
            '\f139' => 'chevron-circle-up',
            '\f078' => 'chevron-down',
            '\f053' => 'chevron-left',
            '\f054' => 'chevron-right',
            '\f077' => 'chevron-up',
            '\f10c' => 'circle-o',
            '\f0ea' => 'clipboard',
            '\f017' => 'clock-o',
            '\f0c2' => 'cloud',
            '\f0ed' => 'cloud-download',
            '\f0ee' => 'cloud-upload',
            '\f121' => 'code',
            '\f126' => 'code-fork',
            '\f0f4' => 'coffee',
            '\f013' => 'cog',
            '\f085' => 'cogs',
            '\f0db' => 'columns',
            '\f075' => 'comment',
            '\f0e5' => 'comment-o',
            '\f086' => 'comments',
            '\f0e6' => 'comments-o',
            '\f14e' => 'compass',
            '\f066' => 'compress',
            '\f09d' => 'credit-card',
            '\f125' => 'crop',
            '\f05b' => 'crosshairs',
            '\f13c' => 'css3',
            '\f0f5' => 'cutlery',
            '\f108' => 'desktop',
            '\f192' => 'dot-circle-o',
            '\f019' => 'download',
            '\f17d' => 'dribbble',
            '\f16b' => 'dropbox',
            '\f052' => 'eject',
            '\f141' => 'ellipsis-h',
            '\f142' => 'ellipsis-v',
            '\f0e0' => 'envelope',
            '\f003' => 'envelope-o',
            '\f12d' => 'eraser',
            '\f153' => 'eur',
            '\f0ec' => 'exchange',
            '\f12a' => 'exclamation',
            '\f06a' => 'exclamation-circle',
            '\f071' => 'exclamation-triangle',
            '\f065' => 'expand',
            '\f08e' => 'external-link',
            '\f14c' => 'external-link-square',
            '\f06e' => 'eye',
            '\f070' => 'eye-slash',
            '\f09a' => 'facebook',
            '\f082' => 'facebook-square',
            '\f049' => 'fast-backward',
            '\f050' => 'fast-forward',
            '\f182' => 'female',
            '\f0fb' => 'fighter-jet',
            '\f15b' => 'file',
            '\f016' => 'file-o',
            '\f15c' => 'file-text',
            '\f0f6' => 'file-text-o',
            '\f0c5' => 'files-o',
            '\f008' => 'film',
            '\f0b0' => 'filter',
            '\f06d' => 'fire',
            '\f134' => 'fire-extinguisher',
            '\f024' => 'flag',
            '\f11e' => 'flag-checkered',
            '\f11d' => 'flag-o',
            '\f0c3' => 'flask',
            '\f16e' => 'flickr',
            '\f0c7' => 'floppy-o',
            '\f07b' => 'folder',
            '\f114' => 'folder-o',
            '\f07c' => 'folder-open',
            '\f115' => 'folder-open-o',
            '\f031' => 'font',
            '\f04e' => 'forward',
            '\f180' => 'foursquare',
            '\f119' => 'frown-o',
            '\f11b' => 'gamepad',
            '\f0e3' => 'gavel',
            '\f154' => 'gbp',
            '\f06b' => 'gift',
            '\f09b' => 'github',
            '\f113' => 'github-alt',
            '\f092' => 'github-square',
            '\f184' => 'gittip',
            '\f000' => 'glass',
            '\f0ac' => 'globe',
            '\f0d5' => 'google-plus',
            '\f0d4' => 'google-plus-square',
            '\f0fd' => 'h-square',
            '\f0a7' => 'hand-o-down',
            '\f0a5' => 'hand-o-left',
            '\f0a4' => 'hand-o-right',
            '\f0a6' => 'hand-o-up',
            '\f0a0' => 'hdd-o',
            '\f025' => 'headphones',
            '\f004' => 'heart',
            '\f08a' => 'heart-o',
            '\f015' => 'home',
            '\f0f8' => 'hospital-o',
            '\f13b' => 'html5',
            '\f01c' => 'inbox',
            '\f03c' => 'indent',
            '\f129' => 'info',
            '\f05a' => 'info-circle',
            '\f156' => 'inr',
            '\f16d' => 'instagram',
            '\f033' => 'italic',
            '\f157' => 'jpy',
            '\f084' => 'key',
            '\f11c' => 'keyboard-o',
            '\f159' => 'krw',
            '\f109' => 'laptop',
            '\f06c' => 'leaf',
            '\f094' => 'lemon-o',
            '\f149' => 'level-down',
            '\f148' => 'level-up',
            '\f0eb' => 'lightbulb-o',
            '\f0c1' => 'link',
            '\f0e1' => 'linkedin',
            '\f08c' => 'linkedin-square',
            '\f17c' => 'linux',
            '\f03a' => 'list',
            '\f022' => 'list-alt',
            '\f0cb' => 'list-ol',
            '\f0ca' => 'list-ul',
            '\f124' => 'location-arrow',
            '\f023' => 'lock',
            '\f175' => 'long-arrow-down',
            '\f177' => 'long-arrow-left',
            '\f178' => 'long-arrow-right',
            '\f176' => 'long-arrow-up',
            '\f0d0' => 'magic',
            '\f076' => 'magnet',
            '\f122' => 'mail-reply-all',
            '\f183' => 'male',
            '\f041' => 'map-marker',
            '\f136' => 'maxcdn',
            '\f0fa' => 'medkit',
            '\f11a' => 'meh-o',
            '\f130' => 'microphone',
            '\f131' => 'microphone-slash',
            '\f068' => 'minus',
            '\f056' => 'minus-circle',
            '\f146' => 'minus-square',
            '\f147' => 'minus-square-o',
            '\f10b' => 'mobile',
            '\f0d6' => 'money',
            '\f186' => 'moon-o',
            '\f001' => 'music',
            '\f03b' => 'outdent',
            '\f18c' => 'pagelines',
            '\f0c6' => 'paperclip',
            '\f04c' => 'pause',
            '\f040' => 'pencil',
            '\f14b' => 'pencil-square',
            '\f044' => 'pencil-square-o',
            '\f095' => 'phone',
            '\f098' => 'phone-square',
            '\f03e' => 'picture-o',
            '\f0d2' => 'pinterest',
            '\f0d3' => 'pinterest-square',
            '\f072' => 'plane',
            '\f04b' => 'play',
            '\f144' => 'play-circle',
            '\f01d' => 'play-circle-o',
            '\f067' => 'plus',
            '\f055' => 'plus-circle',
            '\f0fe' => 'plus-square',
            '\f196' => 'plus-square-o',
            '\f011' => 'power-off',
            '\f02f' => 'print',
            '\f12e' => 'puzzle-piece',
            '\f029' => 'qrcode',
            '\f128' => 'question',
            '\f059' => 'question-circle',
            '\f10d' => 'quote-left',
            '\f10e' => 'quote-right',
            '\f074' => 'random',
            '\f021' => 'refresh',
            '\f18b' => 'renren',
            '\f01e' => 'repeat',
            '\f112' => 'reply',
            '\f122' => 'reply-all',
            '\f079' => 'retweet',
            '\f018' => 'road',
            '\f135' => 'rocket',
            '\f09e' => 'rss',
            '\f143' => 'rss-square',
            '\f158' => 'rub',
            '\f0c4' => 'scissors',
            '\f002' => 'search',
            '\f010' => 'search-minus',
            '\f00e' => 'search-plus',
            '\f064' => 'share',
            '\f14d' => 'share-square',
            '\f045' => 'share-square-o',
            '\f132' => 'shield',
            '\f07a' => 'shopping-cart',
            '\f090' => 'sign-in',
            '\f08b' => 'sign-out',
            '\f012' => 'signal',
            '\f0e8' => 'sitemap',
            '\f17e' => 'skype',
            '\f118' => 'smile-o',
            '\f0dc' => 'sort',
            '\f15d' => 'sort-alpha-asc',
            '\f15e' => 'sort-alpha-desc',
            '\f160' => 'sort-amount-asc',
            '\f161' => 'sort-amount-desc',
            '\f0dd' => 'sort-asc',
            '\f0de' => 'sort-desc',
            '\f162' => 'sort-numeric-asc',
            '\f163' => 'sort-numeric-desc',
            '\f110' => 'spinner',
            '\f0c8' => 'square',
            '\f096' => 'square-o',
            '\f18d' => 'stack-exchange',
            '\f16c' => 'stack-overflow',
            '\f005' => 'star',
            '\f089' => 'star-half',
            '\f123' => 'star-half-o',
            '\f006' => 'star-o',
            '\f048' => 'step-backward',
            '\f051' => 'step-forward',
            '\f0f1' => 'stethoscope',
            '\f04d' => 'stop',
            '\f0cc' => 'strikethrough',
            '\f12c' => 'subscript',
            '\f0f2' => 'suitcase',
            '\f185' => 'sun-o',
            '\f12b' => 'superscript',
            '\f0ce' => 'table',
            '\f10a' => 'tablet',
            '\f0e4' => 'tachometer',
            '\f02b' => 'tag',
            '\f02c' => 'tags',
            '\f0ae' => 'tasks',
            '\f120' => 'terminal',
            '\f034' => 'text-height',
            '\f035' => 'text-width',
            '\f00a' => 'th',
            '\f009' => 'th-large',
            '\f00b' => 'th-list',
            '\f08d' => 'thumb-tack',
            '\f165' => 'thumbs-down',
            '\f088' => 'thumbs-o-down',
            '\f087' => 'thumbs-o-up',
            '\f164' => 'thumbs-up',
            '\f145' => 'ticket',
            '\f00d' => 'times',
            '\f057' => 'times-circle',
            '\f05c' => 'times-circle-o',
            '\f043' => 'tint',
            '\f014' => 'trash-o',
            '\f181' => 'trello',
            '\f091' => 'trophy',
            '\f0d1' => 'truck',
            '\f195' => 'try',
            '\f173' => 'tumblr',
            '\f174' => 'tumblr-square',
            '\f099' => 'twitter',
            '\f081' => 'twitter-square',
            '\f0e9' => 'umbrella',
            '\f0cd' => 'underline',
            '\f0e2' => 'undo',
            '\f09c' => 'unlock',
            '\f13e' => 'unlock-alt',
            '\f093' => 'upload',
            '\f155' => 'usd',
            '\f007' => 'user',
            '\f0f0' => 'user-md',
            '\f0c0' => 'users',
            '\f03d' => 'video-camera',
            '\f194' => 'vimeo-square',
            '\f189' => 'vk',
            '\f027' => 'volume-down',
            '\f026' => 'volume-off',
            '\f028' => 'volume-up',
            '\f18a' => 'weibo',
            '\f193' => 'wheelchair',
            '\f17a' => 'windows',
            '\f0ad' => 'wrench',
            '\f168' => 'xing',
            '\f169' => 'xing-square',
            '\f167' => 'youtube',
            '\f16a' => 'youtube-play',
            '\f166' => 'youtube-square'
        ),

        'awesome_icons_socials' =>array(
            'f170' => 'adn',
            'f17b' => 'android',
            'f179' => 'apple',
            'f171' => 'bitbucket',
            'f171' => 'bitbucket-square',
            'f02e' => 'bookmark',
            'f097' => 'bookmark-o',
            'f15a' => 'btc',
            'f13c' => 'css3',
            'f17d' => 'dribble',
            'f16b' => 'dropbox',
            'f09a' => 'facebook',
            'f082' => 'facebook-square',
            'f16e' => 'flickr',
            'f180' => 'foursquare',
            'f09b'=> 'github' ,
            'f113'=> 'github-alt',
            'f092' => 'github-square',
            'f184' => 'gittip',
            'f0d5' => 'google-plus',
            'f0d4' => 'google-plus-square',
            'f13b' => 'html5',
            'f16d' => 'instagram',
            'f0e1' => 'linkedin',
            'f08c' => 'linkedin-square',
            'f17c' => 'Linux',
            'f136' => 'maxcdn',
            'f18c' => 'pagelines',
            'f0d2' => 'pinterest',
            'f0d3' => 'pinterest-square',
            'f18b' => 'renren',
            'f09e' => 'rss',
            'f17e' => 'skype',
            'f18d' => 'stack-exchange',
            'f16c' => 'stack-overflow',
            'f181' => 'trello',
            'f173' => 'tumblr',
            'f174' => 'Tumblr Square',
            'f099' => 'twitter',
            'f081' => 'twitter-square',
            'f194' => 'vimeo-square',
            'f189' => 'vk',
            'f18a' => 'weibo',
            'f17a' => 'windows',
            'f168' => 'xing',
            'f169' => 'xing-square',
            'f167' => 'youtube'
        ),
        'header_backgrounds' => array(),
        'body_backgrounds'   => array(),

        // tags used in theme options (e.g. %tag%) to have some common informations
        'tag'                => array( //'themeurl' => get_template_directory_uri()
        ),

        'cycle_fx'           => array(
            'blindX'   => 'blindX', 'blindY' => 'blindY', 'blindZ' => 'blindZ', 'cover' => 'cover', 'curtainX' => 'curtainX',
            'curtainY' => 'curtainY', 'fade' => 'fade', 'fadeZoom' => 'fadeZoom', 'growX' => 'growX', 'growY' => 'growY',
            'scrollUp' => 'scrollUp', 'scrollDown' => 'scrollDown', 'scrollLeft' => 'scrollLeft', 'scrollRight' => 'scrollRight', 'scrollHorz' => 'scrollHorz',
            'shuffle'  => 'shuffle', 'slideX' => 'slideX', 'slideY' => 'slideY', 'toss' => 'toss', 'turnUp' => 'turnUp',
            'turnLeft' => 'turnLeft', 'turnRight' => 'turnRight', 'uncover' => 'uncover', 'wipe' => 'wipe', 'zoom' => 'zoom',
            'none'     => 'none', 'turnDown' => 'turnDown', 'scrollVert' => 'scrollVert'
        ),

        'animate' => array(
            '' => "none",
            "bounce" => "bounce",
            "flash" =>"flash",
            "pulse" =>"pulse",
            //"rubberBand"=>"rubberBand",
            "shake" =>"shake",
            "swing"=>"swing",
            "tada" =>"tada",
            "wobble"=>"wobble",
            "bounceIn"=>"bounceIn",
            "bounceInDown"=>"bounceInDown",
            "bounceInLeft"=>"bounceInLeft",
            "bounceInRight"=>"bounceInRight",
            "bounceInUp"=>"bounceInUp",
            "fadeIn"=>"fadeIn",
            "fadeInDown"=>"fadeInDown",
            "fadeInDownBig"=>"fadeInDownBig",
            "fadeInLeft"=>"fadeInLeft",
            "fadeInLeftBig"=>"fadeInLeftBig",
            "fadeInRight"=>"fadeInRight",
            "fadeInRightBig"=>"fadeInRightBig",
            "fadeInUp"=>"fadeInUp",
            "fadeInUpBig"=>"fadeInUpBig",
            "flip"=>"flip",
            "flipInX"=>"flipInX",
            "flipInY"=>"flipInY",
            "lightSpeedIn"=>"lightSpeedIn",
            "rotateIn"=>"rotateIn",
            "rotateInDownLeft"=>"rotateInDownLeft",
            "rotateInDownRight"=>"rotateInDownRight",
            "rotateInUpLeft"=>"rotateInUpLeft",
            "rotateInUpRight"=>"rotateInUpRight",
            //"slideInDown"=>"slideInDown",
            //"slideInLeft"=>"slideInLeft",
            //"slideInRight"=>"slideInRight",
            "rollIn"=>"rollIn",
        ),

        'easings'            => array(
            FALSE              => 'none',
            'easeInQuad'       => 'easeInQuad',
            'easeOutQuad'      => 'easeOutQuad',
            'easeInOutQuad'    => 'easeInOutQuad',
            'easeInCubic'      => 'easeInCubic',
            'easeOutCubic'     => 'easeOutCubic',
            'easeInOutCubic'   => 'easeInOutCubic',
            'easeInQuart'      => 'easeInQuart',
            'easeOutQuart'     => 'easeOutQuart',
            'easeInOutQuart'   => 'easeInOutQuart',
            'easeInQuint'      => 'easeInQuint',
            'easeOutQuint'     => 'easeOutQuint',
            'easeInOutQuint'   => 'easeInOutQuint',
            'easeInSine'       => 'easeInSine',
            'easeOutSine'      => 'easeOutSine',
            'easeInOutSine'    => 'easeInOutSine',
            'easeInExpo'       => 'easeInExpo',
            'easeOutExpo'      => 'easeOutExpo',
            'easeInOutExpo'    => 'easeInOutExpo',
            'easeInCirc'       => 'easeInCirc',
            'easeOutCirc'      => 'easeOutCirc',
            'easeInOutCirc'    => 'easeInOutCirc',
            'easeInElastic'    => 'easeInElastic',
            'easeOutElastic'   => 'easeOutElastic',
            'easeInOutElastic' => 'easeInOutElastic',
            'easeInBack'       => 'easeInBack',
            'easeOutBack'      => 'easeOutBack',
            'easeInOutBack'    => 'easeInOutBack',
            'easeInBounce'     => 'easeInBounce',
            'easeOutBounce'    => 'easeOutBounce',
            'easeInOutBounce'  => 'easeInOutBounce'
        )
    );

    /**
     * Get configuration array
     *
     * @return array
     */
    public static function load() {
        self::_loadThemeInfo();
        //ksort( self::$_config['awesome_icons'] );

        return self::$_config;
    }

    /**
     * Return theme data
     *
     * First the method checks if the wp_get_theme() function exists (WP 3.4.0 at least).
     * If not, the method calls the deprecated function get_template_directory()
     *
     * @return array
     */
    protected static function _loadThemeInfo() {
            $theme = wp_get_theme();

            self::$_config['theme'] = array(
                'name'        => $theme->Name,
                'description' => $theme->Description,
                'author'      => $theme->Author,
                'authoruri'   => $theme->{'Author URI'},
                'version'     => $theme->Version,
                'template'    => $theme->Template,
                'status'      => $theme->Status,
                'tags'        => $theme->Tags
            );
    }


    public function init() {
        self::$_config['header_backgrounds'] = apply_filters( 'yit_header_backgrounds', self::$_config['header_backgrounds'] );
        self::$_config['body_backgrounds']   = apply_filters( 'yit_body_backgrounds', self::$_config['body_backgrounds'] );
    }

    /**
     * Return the font awesome array icon
     *
     * @return string  Array
     * @access public
     * @since 1.0.0
     */
    public static function get_awesome_icons() {
        return self::$_config['awesome_icons'];
    }

    /**
     * Return the font awesome array socials icon
     *
     * @return string  Array
     * @access public
     * @since 1.0.0
     */
    public static function get_awesome_icons_socials() {
        return self::$_config['awesome_icons_socials'];
    }


    /**
     * Return the list of icons
     *
     * @return string  Array
     * @access public
     * @since 1.0.0
     */
    public static function get_icon_list() {

        $standard_icon_list = array(
            'FontAwesome' => self::$_config['awesome_icons2']
        );

        return apply_filters( 'yit_icon_list', $standard_icon_list );
    }

    /**
     * Return the data of icon
     *
     * @return string  Array
     * @access public
     * @since 1.0.0
     */
    public static function get_icon( $icon ) {

        $icon_list = self::get_icon_list();
        $icon_data = '';
        if ( $icon != '' ) {
            $ic        = explode( ':', $icon );
            $icon_code = array_search( $ic[1], $icon_list[$ic[0]] );

            if( $icon_code ){
                $icon_code =  ( strpos( $icon_code, '\\' ) === 0 ) ? '&#x' . substr( $icon_code, 1 ) . ';' : $icon_code;
            }

            $icon_data = 'data-font="' . $ic[0] . '" data-key="' . $ic[1] . '" data-icon="' . $icon_code . '"';
        }

        return $icon_data;
    }


    /*
   * Return the code of the relative awesome class name
   *
   * @return string
   * @access public
   * @since 1.0.0
   */
    public static function get_awesome_icons_code_by_value($class){
        $awesome_icons=self::$_config['awesome_icons'];
        foreach($awesome_icons as $key => $value){
            if($class==$value)  {
               return  $key;
            }
        }

        return "";
    }
}

endif;