<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class selectbox extends Component
{
    public $name;
    public $label;
    public $color;
    public $data;
    public $field;
    public $disabled;
    public $select;

    public function __construct($name, $label, $color, $data, $field, $disabled, $select)
    {
        $this->name = $name;
        $this->label = $label;
        $this->color = $color;
        $this->data = $data;
        $this->field = $field;
        $this->disabled = $disabled;
        $this->select = $select;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.selectbox');
    }
}
