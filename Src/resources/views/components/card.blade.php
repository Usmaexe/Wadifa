<div {{$attributes->merge(["class" => "bg-gray-50 border border-gray-200 rounded p-6"])}}>
  {{$slot}}
  {{-- the slot variable allow us to surrond content with things we want --}}
</div>