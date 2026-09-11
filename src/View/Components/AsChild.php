<?php

declare(strict_types=1);

namespace LaravelUx\Ui\View\Components;

use Closure;
use DOMDocument;
use DOMElement;
use DOMProcessingInstruction;
use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;
use Illuminate\View\ComponentSlot;

class AsChild extends Component
{
    public function render(): Closure
    {
        return function (array $data): ?string {
            /** @var ComponentSlot $slot */
            $slot = $data['slot'];
            /** @var ComponentAttributeBag $attributes */
            $attributes = $data['attributes'];

            if (empty($html = $slot->toHtml())) {
                return null;
            }

            $dom = new DOMDocument;
            libxml_use_internal_errors(true);
            $dom->loadHTML(
                '<?xml encoding="UTF-8">'.$html,
                LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD,
            );
            libxml_clear_errors();

            foreach (iterator_to_array($dom->childNodes) as $node) {
                if ($node instanceof DOMProcessingInstruction) {
                    $dom->removeChild($node);
                }
            }

            foreach ($dom->childNodes as $node) {
                if ($node instanceof DOMElement) {
                    foreach ($attributes->toArray() as $key => $value) {
                        $node->setAttribute($key, $value);
                    }
                }
            }

            return $dom->saveHTML();
        };
    }
}
