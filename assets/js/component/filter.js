/* eslint-disable linebreak-style */
/* eslint-disable class-methods-use-this */
/* eslint-disable no-undef */
class Filter {
  constructor() {
    this.initEvent();
  }

  // Init Event
  initEvent() {
    // Xử lý khi sắp xếp theo điều kiện lọc
    $('.filter-action').click(this.filterSort);

    // Xử lý khi tìm theo điều kiện lọc
    $('.item-search-variable').click(this.filterSearch);

    // Xóa tất cả các điều kiện lọc
    $('.clear-all').click(this.removeAllFilter);

    // Xóa điều kiện lọc khi nhấn vào nó
    $('.filter-value').on('click', '.btn-filter', this.removeClickedFilter);
  }

  // Remove click filter
  removeClickedFilter = (event) => {
    const currentClick = $(event.target);
    const dataFilter = `#${$(currentClick).attr('id')}`;

    // Xóa checked trên bộ lọc
    $(`li[data-filter="${dataFilter}"] .checkbox-item.checked`).removeClass('checked');

    // Xóa nút vừa nhấn
    $(currentClick).remove();

    // Kiểm tra còn điều kiện lọc hay không, nếu không thì ẩn đi
    this.toggleClearButton();
  }

  // Remove all filter
  removeAllFilter = (event) => {
    const currentClick = $(event.target);
    $(currentClick).css('display', 'none');
    $('.btn-filter').remove();
    $('.checkbox-item.checked').removeClass('checked');

    // Xử lý lọc
    this.handleFilter();
  }

  // Xử lý khi nhấn vào sort filter
  filterSort() {
    // Active nút lọc vừa ấn
    $('.filter-action .round').css('display', 'none');
    $('.filter-action .radio-check').css('border-color', '#c4c4c4');
    $(this).find('.round').css('display', 'block');
    $(this).find('.radio-check').css('border-color', '#f30');

    // Chuyển màn hình sang trạng thái chờ
    $('.filter-background-all').css('display', 'block');
    const actionType = $(this).attr('data-action');
    $.ajax({
      url: ajax_object_filter.ajax_url,
      method: 'POST',
      data: {
        action: 'filter_sort_ajax',
        actionType,
        queryObject: ajax_object_filter.query_object,
      },
      dataType: '',
      success: (res) => {
        // Thu màn hình chờ - Chỉnh active button
        $('.filter-background-all').css('display', 'none');
        $('.row.row-main').html(res);
      },
    });
  }

  // Tạo nút hiển thị khi tạo bộ lọc
  createBtnFilter(text, idFilter) {
    const btnHtml = `<div id='${idFilter}' style="background: ${this.createRandomColor()}" class="btn-filter">${text}</div>`;
    return btnHtml;
  }

  // Tìm kiếm theo điều kiện lọc
  filterSearch = (event) => {
    const isCheck = $(event.target).find('.checkbox-item').hasClass('checked');
    const dataFilter = $(event.target).attr('data-filter');
    if (!isCheck) {
      $('.filter-value').find(dataFilter).remove();
    } else {
      // Thêm nút vào hiển thị bộ lọc
      const textLable = $(event.target).text();
      const idFilter = $(event.target).attr('data-filter').substring(1);
      $('.filter-value').prepend(this.createBtnFilter(textLable, idFilter));
    }

    // Kiểm tra còn điều kiện lọc hay không
    if (this.hasFilter()) {
      $('.clear-all').css('display', 'inline-block');
    } else {
      $('.clear-all').css('display', 'none');
    }

    // Kiểm tra còn điều kiện lọc hay không, nếu không thì ẩn đi
    this.toggleClearButton();

    // Xử lý lọc
    this.handleFilter();
  }

  // Xử lý lọc
  handleFilter() {
    const brand = [];
    const price = [];
    const allCheckedBrand = $('li[data-filter-type="brand"].item-search-variable .checkbox-item.checked');
    const allCheckedPrice = $('li[data-filter-type="price"].item-search-variable .checkbox-item.checked');

    // Xử lý lấy dữ liệu lọc theo brand
    allCheckedBrand.each((index, elm) => {
      brand.push($(elm).parent().attr('data-filter-value'));
    });

    // Xử lý lấy dữ liệu lọc theo khoảng giá
    allCheckedPrice.each((index, elm) => {
      price.push($(elm).parent().attr('data-filter-value'));
    });

    // Gọi Ajax
    $.ajax({
      url: ajax_object_filter.ajax_url,
      method: 'POST',
      data: { action },
      dataType: '',
      success: (res) => {
        
      },
    });
  }

  // Kiểm tra còn điều kiện lọc hay không, nếu không thì ẩn đi
  toggleClearButton() {
    // Kiểm tra còn điều kiện lọc hay không
    if (this.hasFilter()) {
      $('.clear-all').css('display', 'inline-block');
    } else {
      $('.clear-all').css('display', 'none');
    }
  }

  // Tạo mã màu tự động
  createRandomColor() {
    const red = Math.round(Math.random() * 256);
    const blue = Math.round(Math.random() * 256);
    const green = Math.round(Math.random() * 256);
    return `rgb(${red} ${blue} ${green})`;
  }

  // Kiểm tra có điều kiện lọc hay không
  hasFilter() {
    const countBtn = $('.btn-filter').length;
    return countBtn > 0;
  }
}

$(document).ready(() => {
  // eslint-disable-next-line no-unused-vars
  const filter = new Filter();
});
