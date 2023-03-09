<div class="widget" style="margin: 0px; min-height: 0px;">
    <p>Danh mục sản phẩm</p>
</div>

<ul class="main-ul">
    @if(isset($categories))
        @foreach($categories as $category)
            <li>
                <a href="" title="">
                    {{data_get($category, 'name')}}
                    @if(!empty(data_get($category, 'children')))
                        <?php $sub_category = data_get($category, 'parent');?>
                        <i class="fa fa-angle-right pull-right" aria-hidden="true"></i>
                    @endif
                </a>
                @if(!empty(data_get($category, 'children')))
                    <ul class="sub">
                        @foreach(data_get($category, 'children') as $sub)
                            <li>
                                <a href="">{{data_get($sub, 'name')}}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
           </li>
        @endforeach
    @endif
</ul>
