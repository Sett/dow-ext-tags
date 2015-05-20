<?php
namespace Listener\Ofweek\Extension;

use \Module\Jeyroik\Event as JRE;
use \Module\Jeyroik\Event\Interfaces as JREI;
use \Module\Ofweek\Core\Code\Template as CT;

class Tags extends JRE\Listener implements JREI\Listener
{
    use JRE\Injection;

    protected $_eventsMap = [
        'award bottom' => 'index'
    ];

    public static function getEvents()
    {
        return ['award bottom'];
    }

    public function index($result, $context)
    {
        $tags     = $this->event('table', 'tags')->issueId($context['id'])->findAll();
        $template = new CT\ItemsList('tags', $tags, 'extension');

        return $template->execute();
    }
}