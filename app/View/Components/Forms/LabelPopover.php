<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LabelPopover extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $for,
        public string $text,
        public string $popoverTarget,
        public string $popoverId,
        public string $popoverTitle,
        public string $popoverDescription,
    ){}
    
        
    

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.label-popover');
    }
}
