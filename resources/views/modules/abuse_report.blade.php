@php
$abuseReportCategories=\App\AbuseReportCategory::all();
@endphp

<div class="modal fade" id="abuseReportModal" tabindex="-1" role="dialog" aria-labelledby="abuseReportModalLabel" aria-hidden="true">
  {!! Form::open(['route'=>'abuse-report.store', 'files' => true]) !!}
  {!! Form::hidden('reportable_type') !!}
  {!! Form::hidden('reportable_id') !!}
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="abuseReportModalLabel">Report Abuse</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach($abuseReportCategories as $category)
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="type" id="abuseReportType{{$category->id}}" value="{{$category->id}}">
            {{$category->title}}
            <i class="fa fa-question-circle-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="{{$category->description}}"></i>
          </label>
        </div>
      @endforeach
          <div class="form-group">
            <label for="ipt-description">Please Explain</label>
              {!! Form::textarea('description', '',['class'=>'form-control','id'=>'ipt-description']) !!}
             <small class="form-text text-muted">The more detail you can provide, the easier it will be for us to respond to this report. </small>
          </div>
        </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Report</button>
          </div>
      </div>

    </div>

  </form>
</div>
@push('scripts')
  <script>

  function openAbuseReport(type,id)
  {
    $('#abuseReportModal input[name="reportable_type"]').val(type);
    $('#abuseReportModal input[name="reportable_id"]').val(id);
    $('#abuseReportModal').modal();
  }
  </script>
@endpush
