<div class="hero__search__form">
    <div class="hero__search__categories">
        Tüm Kategoriler
        <span class="arrow_carrot-down"></span>
    </div>
    <input wire:model="search" type="text" name="search" class="input search-input" list="myList" placeholder="Neye İhtiyacınız Var ?" />
    @if(!empty($query))
    <datalist id="myList">
        @foreach($datalist as $rs)
        <option value="{{$rs->title}}">{{$rs->category->title}}</option>
        @endforeach
        <datalist />
        @endif
</div>