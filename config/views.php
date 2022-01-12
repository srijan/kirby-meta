<?php

return [
    [
        'pattern' => 'meta',
        'action'  => function () {

            $pages = [];

            foreach (site()->index() as $page) {
                $meta = $page->meta();
                $pages[] = [
                    'title' => $page->title()->value(),
                    'meta_title' => $meta->get('meta_title')->value(),
                    'icon'  => $page->blueprint()->icon(),
                    'id' => $page->id(),
                    'template' => $page->template()->name(),
                    'panelUrl' => $page->panelUrl(),
                    'meta_description' => $meta->meta_description()->value(),
                    'robots' => $meta->robots(),
                    'og_title' => $meta->get('og_title')->value(),
                    'og_description' => $meta->get('og_description')->value(),
                    'og_image' => $meta->og_image()?->panel()->image(layout: 'cardlets'),
                    'og_image_alt' => $meta->og_image()?->alt()->value(),
                    'og_image_panelUrl' => $meta->og_image()?->panelUrl(),
                ];
            }

            return [
                'component' => 'k-meta-view',
                'props' => [
                    'pages' => $pages,
                ]
            ];
        }
    ]
];
