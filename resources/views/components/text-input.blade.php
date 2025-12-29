@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'rounded-md shadow-sm', 'style' => 'border-color: #90AB8B;', 'onfocus' => "this.style.borderColor='#5A7863'; this.style.boxShadow='0 0 0 3px rgba(144, 171, 139, 0.2)';", 'onblur' => "this.style.borderColor='#90AB8B'; this.style.boxShadow='';", 'data-color' => '#3B4953']) }}>
