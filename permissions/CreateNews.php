<?php

namespace humhub\modules\news\permissions;

use humhub\libs\BasePermission;
use humhub\modules\space\models\Space;

class CreateNews extends BasePermission
{
    public $defaultAllowedGroups = [
        Space::USERGROUP_OWNER,
        Space::USERGROUP_ADMIN,
        Space::USERGROUP_MODERATOR,
        Space::USERGROUP_USER,
    ];

    protected $fixedGroups = [
        Space::USERGROUP_USER
    ];

    protected $title = "Create News";

    protected $description = "Allows the user to share their story";

    protected $moduleId = 'news';
}
