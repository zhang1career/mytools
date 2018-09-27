<?php

namespace phplab\commands\url;

use phplab\commands\CommandInterface;

class Decode implements CommandInterface
{
    /**
     * @return string
     */
    public function run(array $args)
    {
        if (!isset($args['value']) || !$args['value']) {
            return null;
        }

        $url = parse_url($args['value']);
        if (!$url) {
            return null;
        }

        $this->parse_query($url);

        var_dump($url);
    }

    protected function parse_query(&$url)
    {
        if (!isset($url['query']) || !($url['query'])) {
            return;
        }

        $query = explode('&', $url['query']);
        if (!$query) {
            return;
        }

        $url['query'] = $query;
    }
}
