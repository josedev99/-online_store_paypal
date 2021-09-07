<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input name="name" class="form-control {{ $errors->has('name') ? 'is-invalid': '' }}" id="nombre" type="text" value="{{ old('name',$product->name) }}" aria-describedby="emailHelp" placeholder="Ingresar nombre">
          {!! $errors->first('name','<small class="form-text text-muted" id="emailHelp">:message</small>') !!}
        </div>
        <div class="form-group">
          <label for="description">Descripción</label>
          <textarea class="form-control {{ $errors->has('description') ? 'is-invalid': '' }}" name="description" id="description">{{ old('description',$product->description) }}</textarea>
          {!! $errors->first('description','<small class="form-text text-muted" id="emailHelp">:message</small>') !!}
        </div>

        <div class="form-group">
          <label class="control-label">Precio de compra</label>
          <div class="form-group">
            <label class="sr-only" for="purchase_price">Precio</label>
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text">$</span></div>
              <input name="purchase_price" value="{{ old('purchase_price',$product->purchase_price) }}" class="form-control {{ $errors->has('purchase_price') ? 'is-invalid': '' }}" id="purchase_price" type="number" placeholder="19.99">
              <div class="input-group-append"><span class="input-group-text">.00</span></div>
              
            </div>
          </div>
          {!! $errors->first('purchase_price','<small class="form-text text-muted" id="emailHelp">:message</small>') !!}
        </div>

        <div class="form-group">
          <label class="control-label">Precio de venta</label>
          <div class="form-group">
            <label class="sr-only" for="sale_price">Precio</label>
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text">$</span></div>
              <input name="sale_price"  value="{{ old('sale_price',$product->sale_price) }}" class="form-control {{ $errors->has('sale_price') ? 'is-invalid': '' }}" id="sale_price" type="number" placeholder="99.99">
              <div class="input-group-append"><span class="input-group-text">.00</span></div>
            </div>
          </div>
          {!! $errors->first('sale_price','<small class="form-text text-muted" id="emailHelp">:message</small>') !!}
        </div>

        <div class="form-group">
          <label class="control-label">Descuento en porcentaje</label>
          <div class="form-group">
            <label class="sr-only" for="discount">Porcentaje</label>
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text">%</span></div>
              <input name="discount"  value="{{ old('discount',$product->discount) }}" class="form-control {{ $errors->has('discount') ? 'is-invalid': '' }}" id="discount" type="number" placeholder="%10">
              <div class="input-group-append"><span class="input-group-text">%</span></div>
            </div>
          </div>
          {!! $errors->first('sale_price','<small class="form-text text-muted" id="emailHelp">:message</small>') !!}
        </div>

        <div class="form-group">
          <label for="model">Modelo</label>
          <input type="text" name="model" class="form-control {{ $errors->has('model') ? 'is-invalid': '' }}" value="{{ old('model',$product->model) }}" placeholder="AX-0002">
          {!! $errors->first('model','<small class="form-text text-muted" id="emailHelp">:message</small>') !!}
        </div>

        <div class="form-group">
          <label for="image">Imagen</label>
          <input class="form-control-file {{ $errors->has('image') ? 'is-invalid': '' }}" name="image" id="image" type="file" aria-describedby="fileHelp">
          {!! $errors->first('image','<small class="form-text text-muted" id="emailHelp">:message</small>') !!}
        </div>
    </div>
    <div class="col-lg-4 offset-lg-1">
        <div class="form-group">
          <label for="exampleSelect1">Marca</label>
          <select class="form-control {{ $errors->has('brand_id') ? 'is-invalid': '' }}" id="brand" name="brand_id">
            <option value="" selected>Selecionar</option>
            @foreach ($brands as $brand)
            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
            @endforeach
            
          </select>
        </div>
        <div class="form-group">
          <label for="exampleSelect1">Proveedor</label>
          <select class="form-control {{ $errors->has('supplier_id') ? 'is-invalid': '' }}" id="brand" name="supplier_id">
            <option value="" selected>Selecionar</option>
            @foreach ($suppliers as $supplier)
            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
            
          </select>
        </div>
        <div class="form-group">
          <label for="exampleSelect1">Categoria</label>
          <select class="form-control {{ $errors->has('category_id') ? 'is-invalid': '' }}" id="brand" name="category_id">
            <option value="" selected>Selecionar</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            
          </select>
        </div>
      </div>
    </div>