<div class="galleria" style="height:50vh;">
  @foreach($schematic->images as $image)
    <img src="{{asset('\images\schematics\\'.$image->filename)}}" />
  @endforeach
</div>
@push('scripts')
  <script src="/oni-schematics/public/galleria/galleria-1.5.7.js"></script>
  <script>
    (function() {
      Galleria.loadTheme('{{url('galleria/themes/classic/galleria.classic.min.js')}}');
      Galleria.run('.galleria');
    }());
  </script>
@endpush
