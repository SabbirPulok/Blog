@extends('main')
@section('title','| Contact')
@section('content')
    {{--header row--}}
    <div class="row">
        <div class="col-md-12">
            <h1>Contact Us</h1>
        </div>
    </div>
    {{--end header row--}}
    <hr>
    <form>
        <div class="form-group">
            <label name="email">Email</label>
            <input id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label name="sub">Subject:</label>
            <input id="sub" name="sub" class="form-control">
        </div>
        <div class="form-group">
            <label name="message">Message</label>
            <textarea id="message" name="message" class="form-control">Type your message here...</textarea>
        </div>
        <input type="submit" value="Send Message" class="btn btn-success">
    </form>

@endsection