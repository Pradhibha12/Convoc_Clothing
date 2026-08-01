    
    <style>
        .no-data{
            margin-top: 200px;
            background: transparent;
        }
    </style>
    
    <div class="no-data py-5" >
        <img class="max-w-150px" src="{{ asset('assets/no-data.png') }}" alt="No Data">
        <h3 class="py-3">{{ get_phrase('No Result Found') }}</h3>
        <p class="pb-4">{{ get_phrase('If there is no data, add new records or clear the applied filters.') }}</p>
    </div>
