export function getBackground(cardName) {
  return new URL(
    `../assets/backgrounds/${cardName}.jpg`,
    import.meta.url
  ).href
}


export function getIcon(icon) {
  return new URL(
    `../assets/icons/${icon}.png`,
    import.meta.url
  ).href
}

export function getVideoIcon(icon){
  return new URL(
    `../assets/icons/videos/${icon}.mp4`,
    import.meta.url
  ).href
}

export function getGifIcon(icon){
  return new URL(
    `../assets/icons/gifs/${icon}.gif`,
    import.meta.url
  ).href
}
