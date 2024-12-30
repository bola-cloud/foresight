<div>
  <form class="form" wire:submit.prevent="updateQuestion">
      <div class="form-body">
          <h4 class="form-section"><i class="ft-user"></i> تعديل السؤال</h4>

          <!-- Old Image -->
          @if($image)
              <div class="form-group">
                  <label>الصورة الحالية</label>
                  <img src="{{ asset($image) }}" alt="Current Image" width="100px" height="130px">
              </div>
          @endif

          <!-- Upload New Image -->
          <div class="form-group">
              <label>تغيير الصورة (اختياري)</label>
              <input type="file" class="form-control" wire:model="newimage" accept="image/*">
          </div>

          <!-- Preview New Image -->
          @if($newimage)
              <div class="form-group">
                  <label>معاينة الصورة الجديدة</label>
                  <img src="{{ $newimage->temporaryUrl() }}" alt="New Image" width="100px" height="130px">
              </div>
          @endif

          <!-- Question and Options -->
          <div class="form-group">
              <label>السؤال</label>
              <textarea class="form-control" wire:model="question"></textarea>
          </div>
          <div class="form-group">
              <label>الخيار أ</label>
              <input type="text" class="form-control" wire:model="a">
          </div>
          <div class="form-group">
              <label>الخيار ب</label>
              <input type="text" class="form-control" wire:model="b">
          </div>
          <div class="form-group">
              <label>الخيار ج</label>
              <input type="text" class="form-control" wire:model="c">
          </div>
          <div class="form-group">
              <label>الخيار د</label>
              <input type="text" class="form-control" wire:model="d">
          </div>

          <!-- Correct Answer -->
          <div class="form-group">
              <label>الإجابة الصحيحة</label>
              <select class="form-control" wire:model="true_ans">
                  <option value="a">أ</option>
                  <option value="b">ب</option>
                  <option value="c">ج</option>
                  <option value="d">د</option>
              </select>
          </div>

          <button type="submit" class="btn btn-primary">تحديث</button>
      </div>
  </form>
</div>
