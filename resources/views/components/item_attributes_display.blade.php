@if(!empty($item_attributes))
    @php
        $attr_data = is_array($item_attributes) ? $item_attributes : json_decode($item_attributes, true);
    @endphp
    @if(is_array($attr_data) && count($attr_data) > 0)
        <div class="item-attributes-list my-1">
            @foreach($attr_data as $attr_key => $attr_val)
                @if($attr_key == 'custom_attributes' && is_array($attr_val))
                    @foreach($attr_val as $c_name => $c_val)
                        @if(!empty($c_val))
                            <div class="d-inline-block me-2 mb-1 p-1 px-2 rounded border bg-light">
                                <span class="fw-bold text-danger text-uppercase" style="font-size: 11px;">{{ $c_name }}:</span>
                                <span class="fw-bold text-dark ms-1" style="font-size: 12px;">{{ $c_val }}</span>
                            </div>
                        @endif
                    @endforeach
                @elseif(!in_array($attr_key, ['_token', 'quantity', 'custom_attributes']))
                    @if(is_array($attr_val) && count($attr_val) > 0)
                        <span class="badge bg-secondary text-white me-1 mb-1" style="font-size: 11px;">
                            <span class="text-capitalize">{{ str_replace('_', ' ', $attr_key) }}:</span> {{ implode(', ', $attr_val) }}
                        </span>
                    @elseif(!is_array($attr_val) && !empty($attr_val))
                        <span class="badge bg-secondary text-white me-1 mb-1" style="font-size: 11px;">
                            <span class="text-capitalize">{{ str_replace('_', ' ', $attr_key) }}:</span> {{ $attr_val }}
                        </span>
                    @endif
                @endif
            @endforeach
        </div>
    @endif
@endif
