<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class CommandController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @return int Exit code
     */
    public function actionIndex()
    {
        symlink(\Yii::getAlias('@app').DIRECTORY_SEPARATOR."storage",\Yii::getAlias('@app').DIRECTORY_SEPARATOR.'web'.DIRECTORY_SEPARATOR.'storage');
        return ExitCode::OK;
    }
}
