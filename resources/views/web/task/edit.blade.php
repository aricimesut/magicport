@extends('layout.web')

@section("title")
    {{$title}}
@endsection
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Update Task</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap">
                            <form action="{{route('task.update',["id" => $task->id])}}" method="post" name="form"
                                  id="form"
                                  enctype="multipart/form-data" class="form-horizontal mb-40">
                                @csrf
                                @method('PUT')
                                <input type="hidden" class="form-control" value="{{$task->id}}" name="id">
                                <input type="hidden" class="form-control" value="{{$task->project_id}}"
                                       name="project_id">
                                <div class="form-group">
                                    <label class="control-label mb-10 col-sm-2" for="email_hr">name:</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{$task->name}}" class="form-control"
                                               placeholder="name " name="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-10 col-sm-2" for="email_hr">description:</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{$task->description}}" class="form-control"
                                               placeholder="description " name="description">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-10 col-sm-2">status</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="status">
                                            <option value="todo">To Do</option>
                                            <option value="in_progress">In Progress</option>
                                            <option value="done">Done</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary btn-icon left-icon btn-rounded"><i
                                                class="fa fa-refresh"></i>update
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div id="response"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
