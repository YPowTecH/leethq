<?php
/**
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @copyright Copyright (c) 2013-2016 Alexander Weissman
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/licenses/UserFrosting.md (MIT License)
 */
namespace UserFrosting\Sprinkle\Account\Repository;

use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager as Capsule;
use Interop\Container\ContainerInterface;
use UserFrosting\Sprinkle\Account\Model\User;
use UserFrosting\Sprinkle\Account\Util\Password;
use UserFrosting\Sprinkle\Core\Util\ClassMapper;

class PasswordResetRepository extends TokenRepository
{
    protected $modelIdentifier = 'password_reset';

    protected function updateUser($user, $args)
    {
        $user->password = Password::hash($args['password']);
        // TODO: generate user activity? or do this in controller?
        $user->save();    
    }
}