<template>
  <div class="checkbox">
    <input
        v-model="inputValue"
        :name="name"
        :id="id"
        type="checkbox">
    <label :for="id">
      {{ text }}
    </label>
  </div>
</template>

<script>
export default {
  name: "StandartCheckbox",
  props: {
    text: {
      required: true,
      type: String
    },
    id: {
      required: true,
      type: String
    },
    name: {
      required: false,
      type: String
    },
    value: {
      required: true
    }
  },
  computed: {
    inputValue: {
      get() {
        return this.value;
      },
      set(value) {
        this.$emit('input', value);
      }
    }
  }
}
</script>

<style scoped>
*:before, *:after {
  box-sizing: inherit;
}

@supports (-webkit-appearance: none) or (-moz-appearance: none) {
  input[type=checkbox],
  input[type=radio] {
    --active: #199d1d;
    --active-inner: #fff;
    --focus: 2px rgba(39, 94, 254, 0.3);
    --border: #bbc1e1;
    --border-hover: #275efe;
    --background: #fff;
    --disabled: #f6f8ff;
    --disabled-inner: #e1e6f9;
    -webkit-appearance: none;
    -moz-appearance: none;
    height: 21px;
    outline: none;
    display: inline-block;
    vertical-align: top;
    position: relative;
    margin: 0;
    cursor: pointer;
    border: 1px solid var(--bc, var(--border));
    background: var(--b, var(--background));
    transition: background 0.3s, border-color 0.3s, box-shadow 0.2s;
  }

  input[type=checkbox]:after,
  input[type=radio]:after {
    content: "";
    display: block;
    left: 0;
    top: 0;
    position: absolute;
    transition: transform var(--d-t, 0.3s) var(--d-t-e, ease), opacity var(--d-o, 0.2s);
  }

  input[type=checkbox]:checked,
  input[type=radio]:checked {
    --b: var(--active);
    --bc: var(--active);
    --d-o: 0.3s;
    --d-t: 0.6s;
    --d-t-e: cubic-bezier(0.2, 0.85, 0.32, 1.2);
  }


  input[type=checkbox]:not(.switch),
  input[type=radio]:not(.switch) {
    width: 21px;
  }

  input[type=checkbox] + label,
  input[type=radio] + label {
    line-height: 21px;
    cursor: pointer;
    margin-left: 6px;
    font-family: 'Montserrat', sans-serif;
    font-size: 14px;
    color: #3b3b3b;
  }

  input[type=checkbox]:not(.switch) {
    border-radius: 7px;
  }

  input[type=checkbox]:not(.switch):after {
    width: 5px;
    height: 9px;
    border: 2px solid var(--active-inner);
    border-top: 0;
    border-left: 0;
    left: 7px;
    top: 4px;
    transform: rotate(var(--r, 20deg));
  }

  input[type=checkbox]:not(.switch):checked {
    --r: 43deg;
  }

}
</style>