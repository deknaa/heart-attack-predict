<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectInput extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $name;
    public $options;
    public $placeholder;
    public $selected;

    public function __construct($id, $name, $options = [], $placeholder = null, $selected = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->options = $options;
        $this->placeholder = $placeholder;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.select-input');
    }
}
