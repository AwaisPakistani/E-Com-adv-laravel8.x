<div class="form-group">
    <label>Select Category Level</label>
         <select name="parent_id" id="parent_id" class="form-control select2bs4" style="width: 100%;">
             <option value="0" @if(isset($category_u->parent_id) && $category_u->parent_id==0) selected @endif>Main Category</option>
             @if(!empty($getCategories))
              @foreach($getCategories as $cat)
                   <option value="{{$cat->id}}" @if(isset($category_u->parent_id) && $category_u->parent_id==$cat->id) selected @endif>{{$cat->category_name}}</option>
                     @if(!empty($cat->subCategories))
                       @foreach($cat->subCategories as $subCat)
                           <option value="{{ $subCat->id }}">--{{ $subCat->category_name }}</option>
                       @endforeach
                     @endif
              @endforeach
             @endif 
         </select>
</div>