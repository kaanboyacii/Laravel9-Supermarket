
    <input wire:model="search" type="text" name="search" class="input search-input" list="myList" placeholder="Neye İhtiyacınız Var ?"/>
    @if(!empty($query))
        <datalist id="myList">
            @foreach($datalist as $rs)
                <option value="{{$rs->title}}">{{$rs->category->title}}</option>
            @endforeach
        <datalist/>
    @endif
