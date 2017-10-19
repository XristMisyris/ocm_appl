<template>
  <div class="text-center">
    <button class="btn btn-primary" @click="fetchPokeking()">Show me the POKEKING</button>
    <modal name="pokeking-modal" height="auto" :scrollable="true">
      <div class="text-center">
        <h2>{{ pokeking.informations.name }} is the POKEKING</h2>
        <img :src="pokeking.informations.sprites.front_default" :alt="pokeking.informations.name"/>
        <div class="row stats">
          <h3>Stats</h3>
          <div class="col-md-2 no-gutters" v-for="stat in pokeking.informations.stats">
            <strong>{{ stat.stat.name }}</strong> <br> {{ stat.base_stat }}
          </div>
        </div>
      </div>
    </modal>
  </div>
</template>

<style scoped>
  .no-gutters{
    padding-left: 0px;
    padding-right: 0px;
  }
  .stats{
    padding-bottom: 20px;
  }
</style>

<script>
  export default {
    data () {
      return {
        pokeking: {
          informations: {
            name: '',
            sprites: {
              front_default: ''
            },
            stats: {}
          }
        }
      }
    },

    methods: {
      fetchPokeking () {
        let that = this

        axios.get('/pokeking')
          .then(function (response) {
            that.pokeking = response.data.pokeking
            that.$modal.show('pokeking-modal');
          })
          .catch(function (error) {
            console.log(error)
          })
      }
    }
  }
</script>
