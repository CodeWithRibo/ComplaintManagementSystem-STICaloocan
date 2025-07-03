<section
    :class="open ? 'md:ml-[300px]' : 'md:ml-20'" {{$attributes->merge(['class' => 'pt-16 transition-all duration-300'])}}>
    {{$slot}}
</section>
