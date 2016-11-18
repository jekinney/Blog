@extends('layouts.dashboard')

@section('meta')
    <meta name="count" value="{{ $categories->count() }}">
@endsection

@section('content')
    <div class="row">
        <section class="col-md-8">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Display</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Articles</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->display_order }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->articles_count }}</td>
                            <td class="btn-group">
                                <button type="button" @click="toggleEdit({{ json_encode($category) }})" class="btn btn-primary btn-xs">Edit</button>
                                <a href="" class="btn btn-success btn-xs">See</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <aside class="col-md-4">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <header class="panel-heading text-center">
                    <h2 class="panel-title">Category Data</h2>
                </header>
                <ul class="list-group">
                    <li class="list-group-item text-center">
                        <button type="button" @click="toggleAdd" class="btn btn-primary">Add a new category</button>
                    </li>
                    <li class="list-group-item">Category Total: {{ $categories->count() }}</li>
                    <li class="list-group-item">Article Total: 20</li>
                </section>
            </div>
        </aside>
    </div>
</div>

<div id="categoryModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.blogs.category.store') }}" method="post">
            <input type="hidden" name="id" :value="category.id">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 v-if="category.title" class="modal-title">Edit <span v-text="category.title"></span></h4>
                    <h4 v-else class="modal-title">Add a new Category</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="control-label">Title</label>
                        <input type="text" name="title" id="title" v-model="category.title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description" class="control-label">Description</label>
                        <input type="text" name="description" id="description" v-model="category.description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="display" class="control-label">Display Order</label>
                        <select name="display_order" id="display" v-model="category.display_order" class="form-control">
                            <option v-for="n in count" :value="n" v-text="n"></option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection