<template>
  <div>
    <page-title :text="' Mentor Programları'"/>
    <div class="content">
      <div class="mentor_programs">
        <ul>
          <li>
            <div class="infos">

            </div>
            <div class="inner">
              <div class="profile">

              </div>
              <div class="program_info">

              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="new_mentors">
        <div class="title">
          Yeni Mentorlar
        </div>
        <ul>
          <li>
            sdadas
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "MentorPrograms",
  components: {
    PageTitle: () => import('@/components/pages/shared/Title')
  }
}
</script>

<style scoped>
.content {
  display: flex;
  background-color: white;
  padding: 15px;
  border-radius: 4px;
}

.content > .mentor_programs {
  width: 100%;
}

.mentor_programs > ul {
  padding: 0;
  list-style: none;
  background-color: red;
}

.content > .new_mentors {
  width: 450px;
  margin-left: 10px;
  border-radius: 3px;
  background-color: #f2f2f8;
  padding: 8px;
}

.content > .new_mentors > .title {
  font-family: 'Poppins', sans-serif;
  font-size: 17px;
  text-align: center;
}
</style>