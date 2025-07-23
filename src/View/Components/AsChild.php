<?php

namespace LaravelUx\Ui\View\Components;

use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;
use Illuminate\View\ComponentSlot;

class AsChild extends Component
{
    public function render(): \Closure
    {
        return function (array $data): ?string {
            /** @var ComponentSlot $slot */
            $slot = $data['slot'];
            /** @var ComponentAttributeBag $attributes */
            $attributes = $data['attributes'];

            if (empty($html = $slot->toHtml())) {
                return null;
            }

            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            $dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            libxml_clear_errors();

            foreach ($dom->childNodes as $node) {
                if ($node instanceof \DOMElement) {
                    foreach ($attributes->toArray() as $key => $value) {
                        $node->setAttribute($key, $value);
                    }
                }
            }

            return $dom->saveHTML();
        };
    }
}
