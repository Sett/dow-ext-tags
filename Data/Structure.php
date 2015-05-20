<?php
namespace Data;

use \Module\Jeyroik\Data\Migration as JM;

class Structure extends JM\Structure
{
    protected $_tableName = 'tags';

    public function up()
    {
        $this->createTable('tags',[
                '`id` int(11) NOT NULL AUTO_INCREMENT',
                '`name` varchar(30) NOT NULL',
                '`issueId` int(11) NOT NULL',
                'PRIMARY KEY (`id`)',
                'KEY `name_index` (`name`) USING BTREE',
                'KEY `issueId` (`issueId`)',
                'KEY `nameIssue` (`name`,`issueId`)'
            ]);
    }

    public function down()
    {
        $this->dropTable('tags');
    }
}