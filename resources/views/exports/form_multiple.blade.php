<style type="text/css">
    body {
        font-size: 12px;
    }

    #pdf-wraper {
        page-break-inside: avoid;
        page-break-before: avoid;
        page-break-after: avoid;
    }

    .table-div {
        display: table !important;
        width: 100%;
        margin-bottom: 15px;
    }

    .table-div.has-border {
        border: 1px solid #000000;
    }

    .table-cell-div {
        display: table-cell !important;
        float: none !important;
        width: 50%;
        vertical-align: middle;
    }

    .table-div.has-border .table-cell-div {
        border-right: 1px solid;
        padding: 5px 15px;
    }

    .table-div.has-border .table-cell-div:last-child {
        border-right: 0px;
    }

    .text-left {
        text-align: left !important;
    }

    .text-center {
        text-align: center !important;
    }

    .text-right {
        text-align: right !important;
    }

    .rotate-table {
        width: 100% !important;
        table-layout: fixed;
        width: 60%;
        clear: both;
        padding-top: 200px;
        border: 1px solid;
        overflow: hidden;
        position: relative;
    }

    .rotate-table tr th {
        height: 180px;
        transform: rotate(-90deg) translate(-30px, 15px);
        text-align: left !important;
        line-height: 3.2;
        padding: 0px;
        white-space: nowrap;
        z-index: 9999;
        font-weight: bold;
        color: #000000;
    }

    .rotate-table tr th hr {
        width: 300px;
        margin-left: -50px;
        line-height: 1px;
    }

    .rotate-table tr td {
        padding: 0px;
        margin: 0px;
        white-space: nowrap;
        border-top: 1px solid;
        z-index: 9999;
    }

    .rotate-table tr td input {
        text-align: center;
        width: 50px;
    }

    .rotate-table tr th span,
    .rotate-table tr td span {
        z-index: 9999;
    }

    .rotate-table tr td span::before {
        content: ' ';
        display: block;
        position: absolute;
        right: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        background-color: rgba(50, 80, 200, .5);
        z-index: -1;
    }
</style>

<form action="{{ action('PDFController@exportPDFMultiple') }}" method="POST">
    {{ csrf_field() }}

    @foreach($revieweeIds as $revieweeId)
        <input type="hidden" name="revieweeIds[]" value="{{ $revieweeId }}">
    @endforeach
    <div id="pdf-wraper">
        <div id="header">
            <div class="table-div">
                <div class="table-cell-div text-left" style="width: 33%;">
                    MODULAR ACADEMY
                </div>

                <div class="table-cell-div text-center" style="width: 33%;">
                    RECRUIT PERFORMANCE EVALUATION
                </div>

                <div class="table-cell-div text-right" style="width: 33%;">
                </div>
            </div>
        </div>
        <br/><br/>

        <div id="content">

            <div class="table-div has-border">

                <div class="table-cell-div" style="width: 15%;">
                    RECRUIT:
                </div>

                <div class="table-cell-div" style="width: 35%;">
                </div>

                <div class="table-cell-div" style="width: 10%;">
                    DATE:
                </div>

                <div class="table-cell-div" style="width: 40%;">
                    <input type="date" name="review_date" value="{{ @$settings['date'] }}" required style="border: none;">
                </div>
            </div>

            <div class="table-div has-border" style="margin: 0px;">
                <div class="table-cell-div" style="width: 16%;">
                    EVALUATION PERIOD:
                </div>

                <div class="table-cell-div" style="width: 34%;">
                    <input type="date" name="evaluation_period_from" required value="{{ date('Y-m-d') }}" style="border: none;">
                    to
                    <input type="date" name="evaluation_period_to" required value="{{ date('Y-m-d', strtotime("+ 1 WEEK")) }}" style="border: none">
                </div>

                <div class="table-cell-div" style="width: 20%;">
                    ATTENDANCE:
                </div>

                <div class="table-cell-div" style="width: 30%;">
                </div>
            </div>

            <div class="table-div has-border" style="width: 30%; margin: 0px; position: relative; left: 55%; border-bottom: 0px;">
                <div class="table-cell-div" style="width: 80%;">
                    Tardy(ies):
                </div>

                <div class="table-cell-div" style="width: 20%;">
                    <input type="number" name="review_tardies" required value="0" style="border: none;">
                </div>
            </div>

            <div class="table-div has-border" style="width: 30%; margin: 0px; position: relative; left: 55%; border-bottom: 0px;">
                <div class="table-cell-div" style="width: 80%;">
                    Absence(s):
                </div>

                <div class="table-cell-div" style="width: 20%;">
                    <input type="number" name="review_absences" required value="0" style="border: none;">
                </div>
            </div>

            <div class="table-div has-border" style="width: 30%; margin: 0px; position: relative; left: 55%; border-bottom: 0px;">
                <div class="table-cell-div" style="width: 80%;">
                    Absence Hours:
                </div>

                <div class="table-cell-div" style="width: 20%;">
                    <input type="number" name="review_absence_hours" required value="0" style="border: none;">
                </div>
            </div>

            <div class="table-div has-border" style="width: 40%; position: relative; left: 55%;">
                <div class="table-cell-div" style="width: 80%;">
                    Maximum allowable absece hours:
                </div>

                <div class="table-cell-div" style="width: 20%;">
                    <input type="number" name="review_maximum_allowable_absence_hours" required value="{{ @$settings['max_allow_absence_hours'] }}" style="border: none;">
                </div>
            </div>

            <div class="table-div has-border" style="width: 60%;">
                <div class="table-cell-div" style="width: 80%;">
                    ACADEMIC ACHIEVEMENT/CLASS STANDING:
                </div>

                <div class="table-cell-div text-center" style="width: 10%;">
                    <input type="number" name="review_academic_achievement" required value="0" style="border: none;">
                </div>

                <div class="table-cell-div text-center" style="width: 10%;">
                    of
                </div>

                <div class="table-cell-div text-center" style="width: 10%;">
                    <input type="number" name="review_class_standing" required value="{{ @$settings['class_standing'] }}" style="border: none;">
                </div>
            </div>

            <div class="table-div has-border" style="width: 85%;">
                <div class="table-cell-div" style="width: 30%;">
                    After completing
                </div>

                <div class="table-cell-div text-center" style="width: 10%;">
                    <input type="number" name="review_class_standing" required value="" style="border: none;">
                </div>

                <div class="table-cell-div text-center" style="width: 50%;">
                    tests, you have an overall academic achievement of
                </div>

                <div class="table-cell-div text-center" style="width: 10%;">
                    <input type="number" name="review_academic_achievement_percent" min="0" max="100" required value="" style="width: 60%; border: none;">%
                </div>
            </div>

            <div class="table-div has-border" style="width: 65%;">
                <div class="table-cell-div" style="width: 40%;">
                    EXCELLENCE REPORTS:
                </div>

                <div class="table-cell-div text-center" style="width: 10%;">
                    <input type="number" name="review_excellence_reports" required value="" style="border: none;">
                </div>

                <div class="table-cell-div" style="width: 40%;">
                    DISCREPANCY REPORTS:
                </div>

                <div class="table-cell-div text-center" style="width: 10%;">
                    <input type="number" name="review_discrepancy_reports" required value="" style="border: none;">
                </div>
            </div>

            <div class="table-div has-border">
                <div class="table-cell-div" style="width: 35%;">
                    DISCIPLINARY:
                </div>

                <div class="table-cell-div" style="width: 65%;">
                    <input type="text" name="review_disciplinary_actions" required value="" style="border: none; width: 99%">
                </div>
            </div>

            <br/>

            <div class="table-div">
                <div class="table-cell-div" style="width: 20%; vertical-align: top; padding: 0px">
                    <div style="border: 1px solid; border-right: 0px; padding: 5px;">STAFF COMMENTS:</div>
                </div>
                <div class="table-cell-div" style="width: 80%; border: 1px solid; height: 100px; vertical-align: top;">
                    <div style="padding: 5px;">
                        <textarea name="review_staff_comments" style="border: none;"></textarea>
                    </div>
                </div>
            </div>
			
            <div class="table-div has-border" style="margin: 0px; border-bottom: 0px;">
                <div class="table-cell-div" style="width: 35%;">
                    ACADEMY STAFF OFFICER:
                </div>

                <div class="table-cell-div" style="width: 65%;">

                </div>
            </div>

            <div class="table-div has-border" style="margin: 0px; border-bottom: 0px;">
                <div class="table-cell-div" style="width: 35%;">
                    RECRUIT SIGNATURE:
                </div>

                <div class="table-cell-div" style="width: 65%;">

                </div>
            </div>

            <div class="table-div has-border" style="margin: 0px;">
                <div class="table-cell-div" style="width: 35%;">
                    COMMANDER REVIEW/APPROVAL:
                </div>

                <div class="table-cell-div" style="width: 65%;">

                </div>
            </div>
        </div>
        <br>
        <div class="text-center">
            <input type="submit" class="btn btn-warning" value="Export">
        </div>
        <br>
        <br>
    </div>
</form>


