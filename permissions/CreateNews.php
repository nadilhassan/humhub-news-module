<?php

/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/2/2016
 * Time: 9:40 AM
 */

namespace humhub\modules\news\permissions;

use humhub\modules\space\models\Space;

class CreateNews extends \humhub\libs\BasePermission
{

    /**
     * @inheritdoc
     */
    public $defaultAllowedGroups = [
        Space::USERGROUP_OWNER,
        Space::USERGROUP_ADMIN,
        Space::USERGROUP_MODERATOR,
        Space::USERGROUP_MEMBER,
    ];

    /**
     * @inheritdoc
     */
    protected $fixedGroups = [
        Space::USERGROUP_MEMBER
    ];

    /**
     * @inheritdoc
     */
    protected $title = 'Create News';

    /**
     * @inheritdoc
     */
    protected $description = 'Allows the user to share their story';

    /**
     * @inheritdoc
     */
    protected $moduleId = 'news';
}
