<?php

namespace PHPCord\PHPCord\Parts\Messages\Embeds;

enum EmbedType: string
{
    case RICH = 'rich';
    case IMAGE = 'image';
    case VIDEO = 'video';
    case GIFV = 'gifv';
    case ARTICLE = 'article';
    case LINK = 'link';
}
