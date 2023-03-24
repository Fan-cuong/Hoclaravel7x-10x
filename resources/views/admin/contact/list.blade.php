@extends('admin.layout.master')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Contacts
                        <small>List</small>
                    </h1>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                    {{session('success')}}
                    </div>
                @endif
                <button class="btn btn-success text-center" type="submit"><a href="{{route('admin.contact.create')}} "><i class="fa fa-pencil fa-fw"></i>Create contact</a></button>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr class="odd gradeX" align="center">
                                <td >{{$contact->id}} </td>
                                <td >{{$contact->name}} </td>
                                <td >{{$contact->address}} </td>
                                <td >{{$contact->phone}} </td>
                                <td >{{$contact->subject}} </td>
                                <td >{{$contact->message}} </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.contact.edit',$contact->id)}}"> Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.contact.delete',$contact->id)}}"> Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!!$contacts->links()!!}
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection