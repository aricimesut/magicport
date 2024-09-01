@extends('layout.web')
@section("title")
    {{$title}}
@endsection
@section("content")
    <!-- Row -->
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Project Info</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div>
							<span class="pull-left inline-block capitalize-font txt-dark">
											{{$project->name}}
							</span>
                            <div class="clearfix"></div>
                            <hr class="light-grey-hr row mt-10 mb-10">
                            <span class="pull-left inline-block capitalize-font txt-dark">
											{{$project->description}}
							</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Project Tasks
                            <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#add-modal">
                                <i class="fa fa-plus"></i>
                            </a>
                        </h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">

                        <div class="table-wrap mt-40">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($project->tasks as $task)
                                        <tr>
                                            <td>{{$task->id}}</td>
                                            <td>{{$task->name}}</td>
                                            <td>{{$task->description}}</td>
                                            <td>{{__("status_".$task->status)}}</td>
                                            <td>
                                                <a class="btn btn-danger btn-xs"
                                                   onclick="Destroy('<?= route("task.destroy", ["id" => $task->id])?>',{{$task->id}})">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <a class="btn btn-success btn-xs"
                                                   href="<?= route("task.edit", ["id" => $task->id])?>"> <i
                                                        class="fa fa-search"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
    <div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('task.add')}}" method="post" name="form" id="form"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title">Add new task</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label mb-10">Name:</label>
                            <input type="text" class="form-control" name="name">
                            <input type="hidden" class="form-control" name="project_id" value="{{$project->id}}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label mb-10">Description:</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label mb-10">Status:</label>
                            <select class="form-control" name="status">
                                <option value="todo">To Do</option>
                                <option value="in_progress">In Progress</option>
                                <option value="done">Done</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
